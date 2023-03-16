<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Batch;
use App\Models\Course;
use App\Models\EnrollmentItem;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order_id = $request->order_id;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order_id = $_GET['order_id'];
        return redirect()->route('enrollments.store')
            ->with('order_id');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEnrollmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnrollmentRequest $request)
    {


    }


    public function enroll()
    {
        // http://localhost:8000/enrollments/enroll?status=Success&msg=Transaction%20attempt%20successful&tx_id=EJHVCOURSE16197&bank_tx_id=9AC40D1SLQ&amount=2&bank_status=SUCCESS&sp_code=000&sp_code_des=Approved&sp_payment_option=bkash_api
        # code...
        // status=Failed





        if (Cart::total() == 0) {

            $amount = $_GET['amount'];
            $bank_status = 'SUCCESS';
            $msg = 'Transaction attempt successful';
            $sp_code = 000;
            $sp_code_des = 'Approved';
            $sp_payment_option = 'free';
            $tx_id = 'EJHVCOURSE'.date('YmdHi');
            $bank_tx_id = 'FREE'.date('YmdHi');

            $enrollment = new Enrollment;
            $enrollment->enrollment_number = $tx_id;//EJHVCOURSE16197
            $enrollment->amount = $amount;//2
            $enrollment->bank_status = $bank_status;//SUCCESS
            $enrollment->msg = $msg;//Transaction%20attempt%20successful
            $enrollment->sp_code = $sp_code;//000
            $enrollment->sp_code_des = $sp_code_des;//Approved
            $enrollment->sp_payment_option = $sp_payment_option;//bkash_api
            $enrollment->payment_method = $sp_payment_option;//bkash_api
            $enrollment->status = 'Success';
            $enrollment->tx_id = $tx_id;//EJHVCOURSE16197
            $enrollment->bank_tx_id = $bank_tx_id;//9AC40D1SLQ
            $enrollment->student_id = Auth::user()->id;
            $enrollment->payment_status = 'Success';
            $enrollment->affilator_id = Auth::user()->user_id;
            $enrollment->save();

            $cart = Cart::content();

            $purchesedCourse = [];
            foreach ($cart as $item) {
                $batch = Batch::where('course_id',$item->id)
                ->where('status', '1')
                ->whereRaw('enrolled_students < max_seat')
                ->first();
                $enrollmentTtem = new EnrollmentItem;
                $enrollmentTtem->enrollment_id  = $enrollment->id;
                $enrollmentTtem->student_id = Auth::user()->id;
                $enrollmentTtem->course_id = $item->id;
                $enrollmentTtem->batch_id = $batch->id ;
                $enrollmentTtem->quantity = 1;
                $enrollmentTtem->price = $item->price;
                $enrollmentTtem->save();
                $batch->enrolled_students ++;
                $batch->save();

                array_push($purchesedCourse,$item->id);
            }

        }else{

            $status = $_GET['status'];
            if ($status == 'Failed') {
                return redirect()->route('cart.index')
                ->withSuccess(__('Payment filed'));
            }

            $amount = $_GET['amount'];
            $bank_status = $_GET['bank_status'];
            $msg = $_GET['msg'];
            $sp_code = $_GET['sp_code'];
            $sp_code_des = $_GET['sp_code_des'];
            $sp_payment_option = $_GET['sp_payment_option'];
            $tx_id = $_GET['tx_id'].date('YmdHi');
            $bank_tx_id = $_GET['bank_tx_id'];//9AC40D1SLQ

            $enrollment = new Enrollment;
            $enrollment->enrollment_number = $tx_id;//EJHVCOURSE16197
            $enrollment->amount = $amount;//2
            $enrollment->bank_status = $bank_status;//SUCCESS
            $enrollment->msg = $msg;//Transaction%20attempt%20successful
            $enrollment->sp_code = $sp_code;//000
            $enrollment->sp_code_des = $sp_code_des;//Approved
            $enrollment->sp_payment_option = $sp_payment_option;//bkash_api
            $enrollment->payment_method = $sp_payment_option;//bkash_api
            $enrollment->status = $status;//Success
            $enrollment->tx_id = $tx_id;//EJHVCOURSE16197
            $enrollment->bank_tx_id = $bank_tx_id;//9AC40D1SLQ
            $enrollment->student_id = Auth::user()->id;
            $enrollment->payment_status = $status;//Success
            $enrollment->affilator_id = Auth::user()->user_id;
            $enrollment->save();

            $cart = Cart::content();

            $purchesedCourse = [];
            foreach ($cart as $item) {
                $batch = Batch::where('course_id',$item->id)
                ->where('status', '1')
                ->whereRaw('enrolled_students < max_seat')
                ->first();
                $enrollmentTtem = new EnrollmentItem;
                $enrollmentTtem->enrollment_id  = $enrollment->id;
                $enrollmentTtem->student_id = Auth::user()->id;
                $enrollmentTtem->course_id = $item->id;
                $enrollmentTtem->batch_id = $batch->id ;
                $enrollmentTtem->quantity = 1;
                $enrollmentTtem->price = $item->price;
                $enrollmentTtem->save();
                $batch->enrolled_students = $batch->enrolled_students + 1;
                $batch->save();

                array_push($purchesedCourse,$item->id);
            }


        }



        $user = Auth::user();

        Mail::send('emails.purchese', [
            'name' => $user->name,
            'email' => $user->email,
            'purchesedCourse' => $purchesedCourse,
        ], function($message) use ($user){
            $message->from('info@vcourse.net');
            $message->to($user->email, 'Admin')->subject('Course purchese successfull');
        });

        Cart::destroy();
        return redirect()->route('profile.myprofile',Auth::user()->id)
            ->withSuccess(__('Course purchsed successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnrollmentRequest  $request
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }



    public function verification()
    {
        $order_id = $_GET['order_id'];
        $shurjopay_service = new ShurjopayController();
        // return $shurjopay_service->verify($order_id);
        return Cart::content();
    }
}

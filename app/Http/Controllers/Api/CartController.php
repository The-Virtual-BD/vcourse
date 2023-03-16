<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
// use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
use smasif\ShurjopayLaravelPackage\ShurjopayService;
class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::content();
        return view('frontend.cart',compact('cart'));
    }




    public function store(Request $request, $course)
    {
        // return $request;
        $cartingCourse = Course::with('nextBatch')->findOrFail($course);
        $id = $cartingCourse->id;
        $name = $cartingCourse->name;
        $price = $cartingCourse->price;
        $quantity = $request->quantity;

        Cart::add($id,$name,$quantity,$price);
        // Cart::setGlobalTax(0);
        // Cart::setGlobalDiscount(70);


        // $cart = Cart::content();

        return redirect()
        ->back()
        ->withSuccess(__('Course added to the cart'));
    }


    public function remove($rowID)
    {
        // return $rowID;
        Cart::remove($rowID);
        $cart = Cart::content();
        return view('frontend.cart',compact('cart'));
    }

    public function checkoutpage()
    {
        # code...
        $cart = Cart::content();
        // $courses = Course::with('user')->get();
        // return $courses;
        return view('frontend.checkout',compact('cart'));

    }


    public function checkout(Request $request)
    {

        $cart = Cart::content();
        $shurjopay_service = new ShurjopayService(); //Initiate the object
        $orderNumber = $this->getOrderNumber();// return $orderNumber;
        $tx_id = $shurjopay_service->generateTxId($orderNumber); // Get transaction id.
        $success_route = route('enrollments.enroll');

        // return Cart::total();
        $custom_data = [
            "currency" => "BDT",
            "amount" => Cart::total(),
            "order_id" => $orderNumber,
            "client_ip" => $_SERVER['REMOTE_ADDR'],
            "customer_name" => $request->customer_name,
            "customer_phone" => $request->customer_phone,
            "email" => Auth::user()->email,
            "customer_address" => $request->customer_address,
            "customer_city" => $request->customer_city,
        ];

        if (Cart::total() == 0) {
            return redirect()->route('enrollments.enroll',$custom_data);
        }else{
            // $custom_data
            $shurjopay_service->sendPayment(Cart::total(), $success_route, $custom_data);
        }


    }


    /**
     * This function generates unique order number
     * @scope local
     * @return string
     */
    public function getOrderNumber()
    {
        $random = substr(mt_rand(),0,5);
        $orderNumber = strtoupper('vcourse').$random;
        $orderNumberFound = Enrollment::select('id')->where('enrollment_number',$orderNumber)->first();
        if ($orderNumberFound){
            $this->getOrderNumber();
        }
        return $orderNumber;
    }

}

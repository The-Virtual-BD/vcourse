<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Query\AndExpr;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myprofile(User $user)
    {

        $user = User::where('id',$user->id)->with('instructedCourses')->first();



        if ($user->id == Auth::id()) {
            # code...
        $enrolledCourses = DB::select('SELECT
                courses.id
            FROM
                courses
                INNER JOIN
                    enrollment_items
                    ON
                    enrollment_items.course_id = courses.id
                    WHERE
                    enrollment_items.student_id = '.$user->id
        );


        $runningCourses = DB::select("SELECT
        enrollment_items.student_id,
        enrollment_items.batch_id,
        batches.course_id,
        batches.`status` AS batch_status,
        courses.*,
        users.profile_picture AS instructor_photo,
        users.`name` AS instructor_name,
        users.id AS instructor_id
    FROM
        enrollment_items
        INNER JOIN
        batches
        ON
            enrollment_items.batch_id = batches.id
        INNER JOIN
        courses
        ON
            batches.course_id = courses.id AND
            enrollment_items.course_id = courses.id
        INNER JOIN
        users
        ON
            courses.user_id = users.id
    WHERE
        batches.`status` = '2' AND
        enrollment_items.student_id = $user->id
        ");



        $completedCourses = DB::select("SELECT
        enrollment_items.student_id,
        enrollment_items.batch_id,
        batches.course_id,
        batches.`status` AS batch_status,
        courses.*,
        users.profile_picture AS instructor_photo,
        users.`name` AS instructor_name,
        users.id AS instructor_id
    FROM
        enrollment_items
        INNER JOIN
        batches
        ON
            enrollment_items.batch_id = batches.id
        INNER JOIN
        courses
        ON
            batches.course_id = courses.id AND
            enrollment_items.course_id = courses.id
        INNER JOIN
        users
        ON
            courses.user_id = users.id
    WHERE
        batches.`status` = '3' AND
        enrollment_items.student_id = $user->id
        ");



        $courses = Course::where('status','approved')->with('user','lessons','batches')->get();
        return view('frontend.my_profile', compact('user', 'courses','enrolledCourses','runningCourses','completedCourses'));


        }else{
            return redirect()->back();
        }


    }



    public function instructor(User $user)
    {
        $user = $user;
        $courses = Course::where('user_id',$user->id)->with('user','lessons')->where('status','approved')->get();

        return view('frontend.instructor-profile', compact('user', 'courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

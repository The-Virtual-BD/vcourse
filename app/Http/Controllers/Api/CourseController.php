<?php

namespace App\Http\Controllers\Api;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->where('status','approved')->get();
        return response()->json(['status ' => 200, 'message' => 'Course found', 'data' => $courses  ]);
    }

    public function show(Course $course)
    {
        $enrolledCourseIds = [];
        if (Auth::user()) {
            $userID = Auth::user()->id;
            $enrolledCourses = DB::select('SELECT
                    courses.id
                FROM
                    courses
                    INNER JOIN
                        enrollment_items
                        ON
                        enrollment_items.course_id = courses.id
                        WHERE
                        enrollment_items.student_id = '.$userID
            );

            foreach ($enrolledCourses as $enrolledCourse) {
                $array = (array) $enrolledCourse;
                array_push($enrolledCourseIds, $array['id']);
            }
        }

        // return $enrolledCourseIds;


        $cart = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $startingSoon = false;

        if(Batch::where('course_id', $course->id)
        ->where('status', '1')
        ->count()){
            $startingSoon = true;
        }

        $course = Course::with('user','category','lessons','nextBatch','enrollItems')->find($course->id);
        return response()->json(['status ' => 200, 'message' => 'Course found', 'data' => $course  ]);

    }
}

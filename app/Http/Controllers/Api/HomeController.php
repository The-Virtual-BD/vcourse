<?php

namespace App\Http\Controllers\Api;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\EnrollmentItem;
use App\Models\Lesson;
use App\Models\Teammember;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('category','user','enrollItems')->where('status','approved')->latest()->get();

        // $topSell = [];
        // foreach ($courses as $course) {array_push($topSell,$course->enrollItems->count());}
        // arsort($topSell);
        // $top3 = array_slice($topSell, 0, 3);
        // return $top3;

        $categories = Category::get();
        $testimonials = Testimonial::get();
        $teammembers = Teammember::get();
        return view('frontend.index',compact('courses','categories','testimonials','teammembers'));
    }


    public function underConstruction()
    {
        return view('frontend.underConstruction');

    }

    public function dashboard()
    {
        // return Auth::user()->role;
        $first_day = Carbon::now()->firstOfMonth();//returns first day of this month
        $last_day = Carbon::now()->lastOfMonth();//returns last day of this month

        $pendingCourseCount = Course::where('status','Pending')->count();
        $applications = Application::all();

        $totalCourses = Course::where('status', 'approved')->count();
        $todayCourses = Course::whereDate('created_at', Carbon::today())->count();
        $thisMonthCourses = Course::whereBetween('created_at', [$first_day->format('Y-m-d')." 00:00:00", $last_day->format('Y-m-d')." 23:59:59"])->count();

        $topCourses = Course::where('status','approved')->get()->take(5);
        $todayTopCourses = Course::where('status','approved')->whereDate('created_at', Carbon::today())->get()->take(5);
        $thisMonthTopCourses = Course::whereBetween('created_at', [$first_day->format('Y-m-d')." 00:00:00", $last_day->format('Y-m-d')." 23:59:59"])->where('status','approved')->get()->take(5);


        $topCategories = Category::all()->take(5);
        $todyTopCategories = Category::whereDate('created_at', Carbon::today())->get()->take(5);
        $thisMonthTopCategories = Category::whereBetween('created_at', [$first_day->format('Y-m-d')." 00:00:00", $last_day->format('Y-m-d')." 23:59:59"])->get()->take(5);

        $enrolllments = Enrollment::all();
        $enrollmentItems = EnrollmentItem::all();
        $lessons = Lesson::all();

        $totalSaleCourses = EnrollmentItem::all()->count();
        $todaySaleCourses = EnrollmentItem::whereDate('created_at', Carbon::today())->count();
        $thisMonthSaleCourses = EnrollmentItem::whereBetween('created_at', [$first_day->format('Y-m-d')." 00:00:00", $last_day->format('Y-m-d')." 23:59:59"])->count();

        $totalStudent = DB::table('enrollments')
        ->select('student_id', DB::raw('count(*) as total'))
        ->groupBy('student_id')
        ->count();

        $thisMonthStudent = DB::table('enrollments')
        ->select('student_id', DB::raw('count(*) as total'))
        ->whereBetween('created_at', [$first_day->format('Y-m-d')." 00:00:00", $last_day->format('Y-m-d')." 23:59:59"])
        ->groupBy('student_id')
        ->count();

        $todayStudent = DB::table('enrollments')
        ->select('student_id', DB::raw('count(*) as total'))
        ->whereDate('created_at', Carbon::today())
        ->groupBy('student_id')
        ->count();



        return view('dashboard',compact(
            'pendingCourseCount',
            'topCourses',
            'todayTopCourses',
            'thisMonthTopCourses',
            'topCategories',
            'todyTopCategories',
            'thisMonthTopCategories',
            'enrolllments',
            'enrollmentItems',
            'lessons',
            'applications',
            'totalSaleCourses',
            'todaySaleCourses',
            'thisMonthSaleCourses',
            'totalStudent',
            'thisMonthStudent',
            'todayStudent',
            'totalCourses',
            'todayCourses',
            'thisMonthCourses'
        ));
    }


    public function about()
    {
        $teammembers = Teammember::get();
        return view('frontend.about',compact('teammembers'));
    }


    public function contact()
    {
        return view('frontend.contact');
    }



    public function verify()
    {
        return view('auth.verify-email');
    }



    public function becomeInstructor()
    {
        return view('frontend.become-instructor');

    }


    public function category($category)
    {

        $courses = Course::with('category','user')
        ->where('status','approved')
        ->where('category_id',$category)
        ->get();
        return view('frontend.category',compact('courses'));

    }



    public function faq(){return view('frontend.faq');}
    public function privacy_policy(){return view('frontend.privacy_policy');}
    public function applications(){return view('instructor.applications');}
    public function frontend(){

        $testimonials = Testimonial::all();
        $teammembers = Teammember::all();
        return view('frontend',compact('testimonials','teammembers'));
    }
}

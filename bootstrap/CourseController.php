<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = Course::with('category')->where('status','approved')->latest()->paginate(12);
        $categories = Category::with('courses')->get();
        $maxPrice = Course::max('price');
        $minPrice = Course::min('price');
        return view('frontend.course-search',compact('courses','maxPrice','minPrice','categories'));
    }



    public function search(Request $request)
    {

        // return $request;
        $qurryCat = $request->categories;
        $minR = $request->min_price;
        $maxR = $request->max_price;



        if ($request->search) {
            $courses = Course::where('name','like','%'.$request->search.'%')->where('status','approved')->orderBy('id')->paginate(12);
        }elseif ($request->allcategory) {
            $courses = Course::where('status','approved')
            ->whereBetween('price', [$minR, $maxR])
            ->orderBy('id')
            ->paginate(12);
        }elseif (!empty($qurryCat)) {
            $courses = Course::whereIn('category_id',$qurryCat)
            ->whereBetween('price', [$minR, $maxR])
            ->where('status','approved')
            ->orderBy('id')
            ->paginate(12);
        }elseif ($request->min_price) {
            $courses = Course::whereBetween('price', [$minR, $maxR])
            ->where('status','approved')
            ->orderBy('id')
            ->paginate(12);
        }else{
            $courses = Course::with('category')->where('status','approved')->latest()->paginate(12);
        }



        $categories = Category::with('courses')->get();
        $maxPrice = Course::max('price');
        $minPrice = Course::min('price');
        return view('frontend.course-search',compact('courses','maxPrice','minPrice','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instructors = User::role('instructor')->get() ;
        $categories = Category::all();
        return view('courses.create',compact('instructors','categories'));
    }

    /**
     * Store a newly created resource in storage
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        // return $request;
        // dd($request);
        $course = new Course;
        $course->name = $request->name;
        if ($request->file('coursethumb')) {

            $thumbnail = $request->file('coursethumb');
            $image_full_name = time().'_'.str_replace([" ", "."], ["_","a"],$course->name).$course->id.'.'.$thumbnail->getClientOriginalExtension();
            $upload_path = 'images/frontimages/courses/';
            $image_url = $upload_path.$image_full_name;
            $success = $thumbnail->move($upload_path, $image_full_name);
            $course->thumbnail = $image_url;
        }

        $course->user_id = $request->user_id;

        $course->category_id = $request->category_id;
        $course->status = 'Pending';
        $course->time_duration = $request->time_duration;
        $course->media_link = $request->media_link;
        $course->rating_number = '1';
        $course->rating_quantity = '5';
        $course->number_of_lessons = '1';
        $course->old_price = $request->price;
        $course->discount = $request->discount;
        if ($discount = $request->discount) {
            // discounted_price = original_price - (original_price * discount / 100)
            $original_price = $request->price;
            $discount = $request->discount;
            $discounted_price = $original_price - ( $original_price * $discount/100);
            $course->price = $discounted_price;
        }else{
            $course->price = $request->price;
        }
        $course->timing = $request->timing;
        $course->venu = $request->venu;
        $course->description = $request->description;
        $course->requirments = $request->requirments;
        $course->forwho = $request->forwho;
        $course->what_will_learn = $request->what_will_learn;
	    $course->save();

        return redirect()->route('courses.index')
            ->withSuccess(__('Course created successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
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


        $cart = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $startingSoon = false;
        if(Batch::where('course_id', $course->id)
        ->where('status', '1')
        ->count()){
            $startingSoon = true;
        }

        $course = Course::with('user','category','lessons','nextBatch','enrollItems')->find($course->id);
        return view('frontend.course-details', compact('course','cart','enrolledCourseIds','startingSoon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function watch(Course $course)
    {
        $course = $course;
        $lessons = Lesson::where('course_id',$course->id)->get();

        return view('frontend.watch', compact('course','lessons'));
    }

    /**
     * Show the list of pending resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function pending(Course $course)
    {
        // $pendingCourses = DB::table('courses')->where('status', 'pending');
        $pendingCourses = Course::with('user')->where('status', 'pending')->get();
        $i = 1;
        // return $pendingCourses;
        return view('courses.pending',compact('pendingCourses','i'));

    }



    /**
     * Show the list of pending resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function pendingshow(Course $course)
    {
        $course = Course::with('user','category')->find($course->id);
        return view('frontend.pendingshow',compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
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


        $cart = \Gloudemans\Shoppingcart\Facades\Cart::content();
        $startingSoon = false;
        if(Batch::where('course_id', $course->id)
        ->where('status', '1')
        ->count()){
            $startingSoon = true;
        }

        $instructors = User::role('instructor')->get() ;
        $categories = Category::all();

        $course = Course::with('user','category','lessons','nextBatch','enrollItems')->find($course->id);
        return view('courses.edit', compact('course','cart','enrolledCourseIds','startingSoon','instructors','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function approve(UpdateCourseRequest $request, Course $course)
    {

        // $course->update('status',$request->status);
        $course->status = $request->status;
        $course->update();
        // return redirect('/articles');
        // return $course;
        return redirect()->route('courses.pending')
            ->withSuccess(__('Course Approved'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course = Course::find($course->id);

        if ($request->name) {
            $course->name = $request->name;
        }
        if ($request->user_id) {
            $course->user_id = $request->user_id;
        }

        if ($request->file('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $image_full_name = time().'_'.str_replace([" ", "."], ["_","a"],$course->name).$course->id.'.'.$thumbnail->getClientOriginalExtension();
            $upload_path = 'images/frontimages/courses/';
            $image_url = $upload_path.$image_full_name;
            $success = $thumbnail->move($upload_path, $image_full_name);
            $course->thumbnail = $image_url;
        }


        // $course->category_id = $request->category;
        // $course->status = $request->status;
        // $course->time_duration = $request->time_duration;
        // $course->media_link = $request->media_link;

        if ($request->price) {
            $course->price = $request->price;
        }
        if ($request->discount) {
            $course->discount = $request->discount;
        }

        // $course->timing = $request->timing;
        // $course->venu = $request->venu;

        if ($request->description) {
            $course->description = $request->description;
        }
        if ($request->requirments) {
            $course->requirments = $request->requirments;
        }
        if ($request->forwho) {
            $course->forwho = $request->forwho;
        }
        if ($request->what_will_learn) {
            $course->what_will_learn = $request->what_will_learn;
        }


	    $course->save();

        return redirect()->route('courses.edit',$course->id)
            ->withSuccess(__('Course Update successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.pending')
                        ->with('success','Course deleted successfully');
    }
}

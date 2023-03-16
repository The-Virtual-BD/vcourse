<?php

namespace App\Http\Controllers\Api;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->roles->first()->name;

        if ($role== 'instructor') {
        $courses =  Course::with('user')
                    ->where('user_id',Auth::user()->id)
                    ->where('status','approved')
                    ->get();

        } else {
            $courses =  Course::with('user')
                        ->where('status','approved')
                        ->get();
        }


        return view('lessons.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonRequest $request)
    {

        $batchID = Batch::where('course_id', $request->course_id)->where('status', '2')->pluck('id')->first();

        if ($batchID) {
            $lesson = new Lesson;
            $lesson->name = $request->name;
            $lesson->thumbnail = $request->thumbnail;
            $lesson->user_id = Auth::user()->id;
            $lesson->course_id = $request->course_id;
            $lesson->media_link = $request->media_link;
            $lesson->description = $request->description;
            $lesson->note = $request->note;
            $lessonQuentity =  Lesson::where('course_id', $request->course_id)->count();
            $lesson->number = $lessonQuentity + 1;

            $lesson->batch_id  = $batchID;




            // return $lesson;
            $lesson->save();

            //updating lesson quentity of this course
            Course::where('id', $request->course_id)->update(array('number_of_lessons' => $lessonQuentity + 1));

            return redirect()->route('courses.watch', $request->course_id)
                ->withSuccess(__('Lesson added successfully to this course.'));
        }else{
            return redirect()->route('lessons.create')
                ->withErrors(__('No running (status 2) batches in this course.'));
        }




    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lesson = $lesson;
        $role = Auth::user()->roles->first()->name;

        if ($role== 'instructor') {
        $courses =  Course::with('user')
                    ->where('user_id',Auth::user()->id)
                    ->where('status','approved')
                    ->get();

        } else {
            $courses =  Course::with('user')
                        ->where('status','approved')
                        ->get();
        }


        return view('lessons.edit',compact('courses','lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
            $lesson = $lesson;
            $lesson->name = $request->name;
            $lesson->thumbnail = $request->thumbnail;
            $lesson->user_id = Auth::user()->id;
            $lesson->media_link = $request->media_link;
            $lesson->description = $request->description;
            $lesson->note = $request->note;
            $lessonQuentity =  Lesson::where('course_id', $request->course_id)->count();
            $lesson->number = $lessonQuentity + 1;
            $lesson->save();

            return redirect()->route('batches.show', $lesson->batch_id)
                ->withSuccess(__('Lesson updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {

        $lesson->delete();
        return back()->with('success','Lesson deleted successfully');
    }
}

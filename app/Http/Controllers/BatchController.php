<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Models\Course;
use PhpParser\Node\Stmt\Return_;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $i = 1;
        $batches = Batch::with('course')->get();
        return view('batches.index',compact('batches','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        // $array = (array) $courses;
        // return $array;
        return view('batches.create',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBatchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBatchRequest $request)
    {
        $coursename = Course::find($request->course_id)->name;
        $batch = new Batch;
        $batch->name = $coursename.' ( Batch: '.$request->number.')';
        $batch->course_id  = $request->course_id ;
        $batch->number = $request->number;
        $batch->status = '1';
        $batch->last_ennrollment_date = $request->last_ennrollment_date;
        $batch->class_starting_date = $request->class_starting_date;
        $batch->max_seat = $request->max_seat;
        $batch->enrolled_students = 0;
        $batch->save();
        return redirect()->route('batches.index')
            ->withSuccess(__('Batch added successfully to this course.'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        $batch = Batch::where('id',$batch->id)->with('students','lessons')->first();
        return view('batches.show',compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        $courses = Course::all();
        return view('batches.edit', ['batch' => $batch],compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBatchRequest  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBatchRequest $request, Batch $batch)
    {
        $this->validate($request, [
            'name' => 'sometimes',
            'number' => 'sometimes',
            'course_id' => 'sometimes',
            'status' => 'sometimes',
            'max_seat' => 'sometimes',
            'last_ennrollment_date' => 'sometimes',
            'class_starting_date' => 'sometimes',
        ]);


        $batch = $batch;
        $batch->number = $request->number;
        $batch->course_id = $request->course_id;
        $batch->status = $request->status;
        $batch->max_seat = $request->max_seat;
        $batch->last_ennrollment_date = $request->last_ennrollment_date;
        $batch->class_starting_date = $request->class_starting_date;

        // return $batch;

        $batch->save();

        return redirect()->route('batches.index')
            ->withSuccess(__('Batches updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();

        return redirect()->route('batches.index')
            ->withSuccess(__('Batche deleted.'));
    }
}

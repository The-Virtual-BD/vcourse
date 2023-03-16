<?php

namespace App\Http\Controllers\Api;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->rev_text = $request->rev_text;
        $testimonial->rev_number = $request->rev_number;
        $testimonial->designation = $request->designation;


        if ($request->file('rev_photo')) {
            $image = $request->file('rev_photo');
            $image_full_name = time().'.'.$image->extension();
            $upload_path = 'images/testimonials/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $testimonial->rev_photo = $image_url;
        }

        $testimonial->save();

        return redirect()->route('home.frontend')->withSuccess(__('Added'));
        // return response()->json(['success'=>'Successfully Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimonialRequest  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('home.frontend')
            ->withSuccess(__('Deleted'));
    }
}

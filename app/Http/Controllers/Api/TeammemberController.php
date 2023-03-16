<?php

namespace App\Http\Controllers\Api;

use App\Models\Teammember;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeammemberRequest;
use App\Http\Requests\UpdateTeammemberRequest;

class TeammemberController extends Controller
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
     * @param  \App\Http\Requests\StoreTeammemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeammemberRequest $request)
    {
        $teammember = new Teammember;
        $teammember->name = $request->name;
        $teammember->designation = $request->designation;

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $image_full_name = time().'.'.$image->extension();
            $upload_path = 'images/team$teammembers/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $teammember->photo = $image_url;
        }

        $teammember->facebook = $request->facebook;
        $teammember->linkedin = $request->linkedin;
        $teammember->save();

        return redirect()->route('home.frontend')->withSuccess(__('Added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teammember  $teammember
     * @return \Illuminate\Http\Response
     */
    public function show(Teammember $teammember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teammember  $teammember
     * @return \Illuminate\Http\Response
     */
    public function edit(Teammember $teammember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeammemberRequest  $request
     * @param  \App\Models\Teammember  $teammember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeammemberRequest $request, Teammember $teammember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teammember  $teammember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teammember $teammember)
    {
        $teammember->delete();

        return redirect()->route('home.frontend')
            ->withSuccess(__('Deleted'));
    }
}

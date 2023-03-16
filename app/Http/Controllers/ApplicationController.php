<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Role;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::with('user')->get();
        // return $applications;
        $i = 1;
        return view('applications.index',compact('applications','i'));
    }



    /**
     * Downloadin CV.
     *
     * @return \Illuminate\Http\Response
     */
    public function cv(Application $application)
    {
        $pathToFile = User::find($application->user->id)->cv;
        return response()->download($pathToFile);
    }


    /**
     * Approving application.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve(Application $application)
    {
        $application->status = 2;
        $application->save();
        $user = User::find($application->user->id);
        $user->syncRoles(2);


        //sending mail of application confirmation
        Mail::send('emails.applicationa', [
            'name' => $user->name,
            'email' => $user->email,
        ], function($message) use ($user){
            $message->from('info@vcourse.net');
            $message->to($user->email, 'Admin')->subject('Application approved');
        });

        return redirect()
        ->route('applications.index')
        ->withSuccess(__('Application approved.'));
    }


    /**
     * Approving application.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject(Application $application)
    {
        $application->status = 3;
        $application->save();
        $user = User::find($application->user->id);
        //sending mail of application confirmation
        Mail::send('emails.applicationr', [
            'name' => $user->name,
            'email' => $user->email,
        ], function($message) use ($user){
            $message->from('info@vcourse.net');
            $message->to($user->email, 'Admin')->subject('Application Rejected');
        });
        $user->syncRoles(3);


        return redirect()
        ->route('applications.index')
        ->withSuccess(__('Application Rejected.'));

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
     * @param  \App\Http\Requests\StoreApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicationRequest  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}

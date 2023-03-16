<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::latest()->paginate(10);

        $admins = User::role('admin')->get();
        $instructors = User::role('instructor')->get();
        $students = User::role('student')->get();
        $tortalUser = User::count();
        return view('users.index', compact('admins','instructors','students','tortalUser'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'test'
        ]));


        $role = Role::where('name','student');
        $user->assignRole([$role->id]);

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {


        // return $request;

        if ($request->name) {$user->name = $request->name;}

        if ($request->email) {

            $isUser = User::where('email', $request->email)
            ->where('id', '!=' , $user->id)
            ->count();

            if ( $isUser > 0) {
                return redirect()->route('profile.myprofile',$user->id)
                ->withSuccess(__('Email already taken.'));
            }else{
                $user->email = $request->email;
                $user->email_verified_at = NULL;
            }

        }

        if ($request->phone_number) {


            $isUser = User::where('phone_number', $request->phone_number)
            ->where('id', '!=' , $user->id)
            ->count();

            if ( $isUser > 0) {
                return redirect()->route('profile.myprofile',$user->id)
                ->withSuccess(__('Phone Number already taken.'));
            }else{
                $user->phone_number = $request->phone_number;
            }

        }

        if ($request->file('profile_picture')) {
            // return $request;
            $image = $request->file('profile_picture');
            $image_full_name = time().'_'.$user->name.$user->id.'.'.$image->extension();
            $upload_path = 'images/pp/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $user->profile_picture = $image_url;
            // return response()->json('Image uploaded successfully');
        }


        if ($request->file('cv')) {
            $resume = $request->file('cv');
            $resume_full_name = time().'_'.$user->name.$user->id.'.'.$resume->extension();
            $upload_path = 'resume/';
            $resume_url = $upload_path.$resume_full_name;
            $success = $resume->move($upload_path, $resume_full_name);
            $user->cv = $resume_url;



            $isApplied = Application::where('user_id', $user->id)->first();//is user already apply
            if ($isApplied) {
                $application = $isApplied;
                $application->status = 1;
	            $application->save();

            }else{
                $application = new Application;
                $application->user_id = $user->id;
                $application->status = 1;
	            $application->save();
            }


        }

        if ($request->facebook) {$user->facebook = $request->facebook;}
        if ($request->linkedin) {$user->linkedin = $request->linkedin;}
        if ($request->designation) {$user->designation = $request->designation;}
        if ($request->experties) {
            $user->experties = $request->experties;
            $user->applied = 1;
        }
        if ($request->about_me) {$user->about_me = $request->about_me;}
        if ($request->note) {$user->note = $request->note;}

        // saving this user data
        $user->save();

        if ($request->experties) {
            Mail::send('emails.application', [
                'name' => $user->name,
                'email' => $user->email,
            ], function($message) use ($user){
                $message->from('info@vcourse.net');
                $message->to($user->email, 'Admin')->subject('Application on review');
            });
        }


        //updating only data
        if ($request->role) {
            $user->update($request->validated());
            $user->syncRoles($request->get('role'));
        }

        if (Auth::user()->roles[0]->name == 'instructor' || 'student') {
            return redirect()->route('profile.myprofile',$user->id)
                ->withSuccess(__('User updated successfully.'));
        }else{
            return redirect()->route('users.index')
                ->withSuccess(__('User updated successfully.'));
        }

    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}

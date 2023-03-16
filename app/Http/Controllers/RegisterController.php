<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\Application;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('frontend.signup');
    }


    // email address check
    public function mailcheck(Request $request)
    {
        if ($request->email_check) {
            $existing_email = User::where('email', $request->email)->count();

            if ( $existing_email > 0) {
                echo "taken";
            }else{
                echo "not_taken";
            }
            exit();
        }

    }

    // username check
    public function usercheck(Request $request)
    {
        if ($request->username_check) {
            $existing_username = User::where('username', $request->username)->count();

            if ( $existing_username > 0) {
                echo "taken";
            }else{
                echo "not_taken";
            }
            exit();
        }

    }


    // username check
    public function phonecheck(Request $request)
    {
        if ($request->phone_number_check) {
            $existing_phone_number = User::where('phone_number', $request->phone_number)->count();

            if ( $existing_phone_number > 0) {
                echo "taken";
            }else{
                echo "not_taken";
            }
            exit();
        }

    }



    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {


        // return $request;
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;


        if ($request->file('cv')) {
            $resume = $request->file('cv');
            $resume_full_name = time().'_'.$user->name.$user->id.'.'.$resume->extension();
            $upload_path = 'resume/';
            $resume_url = $upload_path.$resume_full_name;
            $success = $resume->move($upload_path, $resume_full_name);
            $user->cv = $resume_url;
        }

        if ($request->experties) {
            $user->experties = $request->experties;
            $user->applied = 1;
        }
        $user->about_me = $request->about_me;
        $user->save();


        $role = Role::where('name','student')->get()->first();
        $user->assignRole([$role->id]);


        auth()->login($user);

        if ($request->experties) {
            // creating new application
            $application = new Application;
            $application->user_id = $user->id;
            $application->status = 1;
	        $application->save();
            //sending mail of application confirmation
            Mail::send('emails.application', [
                'name' => $request->name,
                'email' => $request->email,
            ], function($message) use ($request){
                $message->from('info@vcourse.net');
                $message->to($request->email, 'Admin')->subject('Application on review');
            });
        }else{
            //sending welcome mail
            Mail::send('emails.welcomeMail', [
                'name' => $request->name,
                'email' => $request->email,
            ], function($message) use ($request){
                $message->from('info@vcourse.net');
                $message->to($request->email, 'Admin')->subject('Welcome to Vcourse');
            });
        }


        return redirect()
        ->route('profile.myprofile',Auth::user()->id)
        ->with('success', "Welcome to Vcourse.");
    }


    // sending password reset mail
    public function passemail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink( $request->only('email'));
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    // Updating password
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login.show')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
                    return redirect()
        ->route('login.show')
        ->with('success', "Password Updated, please login");
    }
}

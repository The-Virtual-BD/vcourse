<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Dotenv\Validator;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Mail;
class SocialController extends Controller
{
    //Facebook
    public function facebookRedirect()
    {
        # code...
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {   $user = Socialite::driver('facebook')->user();
        if ($user ) {

            // dd($user);
            $isUser = User::where('fb_id', $user->id)->first();
            if ($isUser) {
                Auth::login($isUser);
                return redirect()
                ->route('home.index');
            }else{
                // return $user;
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => 'vcstudent$556',
                ]);

                $role = Role::where('name','student');


                $createUser->assignRole([3]);

                Auth::login($createUser);


                return redirect()->route('home.index');
            }
        }else{
            return redirect()->route('register.show');

        }
    }



    // //Google
    public function googleRedirect()
    {
        # code...
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function loginWithGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        if ($user ) {
            $isgmailID = User::where('google_id', $user->id)
                ->first();
            $isEmail = User::where('email',$user->email)->first();


            if ($isgmailID || $isEmail) {
                Auth::login($isEmail);
                return redirect()
                ->route('home.index');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => 'vcstudent$556',
                ]);

                $role = Role::where('name','student');
                $createUser->assignRole([3]);

                Auth::login($createUser);


                // sending mail
                Mail::send('emails.welcomeMail', [
                    'name' => $user->name,
                    'email' => $user->email,
                ], function($message) use ($user){
                    $message->from('info@vcourse.net');
                    $message->to($user->email, 'Admin')->subject('Welcome to Vcourse');
                });

                return redirect()->route('home.index');
            }
        } else {
            //throw $th;
            return redirect()->route('register.show');
        }
    }
}

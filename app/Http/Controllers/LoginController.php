<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('frontend.signin');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->getCredentials();

    //     if(!Auth::validate($credentials)):
    //         return redirect()->route('login.show')
    //             ->withErrors(trans('auth.failed'));
    //     endif;

    //     $user = Auth::getProvider()->retrieveByCredentials($credentials);

    //     Auth::login($user);

    //     return $this->authenticated($request, $user);
    // }

    public function login(Request $request)
    {

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        if(auth()->attempt($credentials))
        {
            return redirect()->route('home.index');
        }else{
            // dd($credentials);
            return redirect()->route('login.show')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}

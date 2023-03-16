<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->phone_number = $request->phone_number;
            $user->password = $request->password;
            $user->about_me = $request->about_me;

            // if user submit any cv
            if ($request->file('cv')) {
                $resume = $request->file('cv');
                $resume_full_name = time() . '_' . $user->name . $user->id . '.' . $resume->extension();
                $upload_path = 'resume/';
                $resume_url = $upload_path . $resume_full_name;
                $success = $resume->move($upload_path, $resume_full_name);
                $user->cv = $resume_url;
            }
            // if user submit any experties
            if ($request->experties) {
                $user->experties = $request->experties;
                $user->applied = 1;
            }

            $user->save();


            $role = Role::where('name', 'student')->get()->first();
            $user->assignRole([$role->id]);
            // ---------------------------

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $credentials = [
                $fieldType => $request->username,
                'password' => $request->password,
            ];

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            } elseif (Auth::attempt($credentials)) {
                $user = User::where($fieldType, $request->username)->first();

                return response()->json([
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    // sending password reset mail
    public function passemail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
            ? response()->json(['status' => __($status)])
            : response()->json(['email' => __($status)]);
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
            ? response()->json(['status', __($status)])
            : response()->json(['email' => [__($status)]]);
    }



    // Updating password
    public function logout()
    {
        try {
            // Deletion personal access token
            Auth::user()->currentAccessToken()->delete();
            // Returning response if success
            return response()->json([
                'message' => 'Logout successfull'
            ], 200);
        } catch (\Throwable $e) {
            // Returning response if response failed
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

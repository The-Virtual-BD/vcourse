<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::get('/test', function(){
    return response()->json(['message' => 'Its working fine!'], 200);
});





// https://vcourse.net/api/auth/register
// https://vcourse.net/api/auth/login
// https://vcourse.net/api/{user}/instructor
// https://vcourse.net/api/{user}/profile
// https://vcourse.net/api/checkout

// -------------------------
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


// Route for auth user
Route::group(['middleware' => ['auth:sanctum']], function () {

    // Logout
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    // Sending verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification mail sent.'], 200);
    });
    // verifying
    Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
        $request->fulfill();
        return response()->json(['message' => 'Your email verified successfully'], 200);
    });


    // Resourse
    Route::apiResource('posts', CourseController::class);
});




Route::group(['namespace' => 'App\Http\Controllers\API'], function () {

    // Routes for unauth users
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/about', 'HomeController@about')->name('home.about');
    Route::get('/contact', 'HomeController@contact')->name('home.contact');
    Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('home.privacy_policy');
    Route::get('/becomeInstructor', 'HomeController@becomeInstructor')->name('home.becomeInstructor');
    Route::get('/category/{category}', 'HomeController@category')->name('home.category');
    Route::get('/faq', 'HomeController@faq')->name('home.faq');
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
    Route::get('/{user}/instructor', 'ProfileController@instructor')->name('profile.instructor');
    Route::resource('events', EventController::class);





    Route::group(['prefix' => 'subscriptions'], function () {
        Route::get('/', 'SubscriptionController@index')->name('subscriptions.index');
        Route::post('/store', 'SubscriptionController@store')->name('subscriptions.store');
        Route::get('/edit/{subscription}', 'SubscriptionController@edit')->name('subscriptions.edit');
        Route::delete('/destroy/{subscription}', 'SubscriptionController@destroy')->name('subscriptions.destroy');
    });


    // Route::resource('contacts', ContactController::class);

    Route::group(['prefix' => 'contacts'], function () {
        Route::post('/store', 'ContactController@store')->name('contacts.store');
    });

    // Login or signup with facebook and google
    Route::get('auth/google', 'SocialController@googleRedirect')->name('auth.googleRedirect');
    Route::get('auth/google/callback', 'SocialController@loginWithGoogle')->name('auth.loginWithGoogle');

    //Login with facebook
    Route::get('auth/facebook', 'SocialController@facebookRedirect')->name('auth.facebookRedirect');
    Route::get('auth/facebook/callback', 'SocialController@loginWithFacebook')->name('auth.loginWithFacebook');


    Route::group(['prefix' => 'courses'], function () {
        Route::get('/', 'CourseController@index')->name('courses.index');
        Route::get('/{course}/show', 'CourseController@show')->name('courses.show');
        Route::post('/search', 'CourseController@search')->name('courses.search');
    });

    Route::group(['middleware' => ['guest']], function () {

        Route::get('/forgot-password', function () {
            return view('frontend.forget-password');
        })->name('password.request');
        Route::post('/forgot-password', 'RegisterController@passemail')->name('password.passemail');
        Route::get('/reset-password/{token}', function ($token) {
            return view('auth.reset-password', ['token' => $token]);
        })->name('password.reset');

        Route::post('/reset-password', 'RegisterController@update')->name('password.update');




        // Register Routes
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::post('/mailcheck', 'RegisterController@mailcheck')->name('register.mailcheck');
        Route::post('/usercheck', 'RegisterController@usercheck')->name('register.usercheck');
        Route::post('/phonecheck', 'RegisterController@phonecheck')->name('register.phonecheck');

        // Login Routes
        // Route::get('/login', 'LoginController@show')->name('login.show');
        // Route::post('/login', 'LoginController@login')->name('login.perform');




        // Login or signup with facebook and google
        Route::get('auth/google', 'SocialController@googleRedirect')->name('auth.googleRedirect');
        Route::get('auth/google/callback', 'SocialController@loginWithGoogle')->name('auth.loginWithGoogle');

        //Login with facebook
        Route::get('auth/facebook', 'SocialController@facebookRedirect')->name('auth.facebookRedirect');
        Route::get('auth/facebook/callback', 'SocialController@loginWithFacebook')->name('auth.loginWithFacebook');
    });

    //Only for authenticate user
    Route::group(['middleware' => ['auth:sanctum', 'permission']], function () {


        Route::group(['prefix' => 'applications'], function () {
            Route::get('/', 'ApplicationController@index')->name('applications.index');
            Route::post('/cv/{application}', 'ApplicationController@cv')->name('applications.cv');
            Route::get('/update/{application}', 'ApplicationController@update')->name('applications.update');
            Route::post('/approve/{application}', 'ApplicationController@approve')->name('applications.approve');
            Route::post('/reject/{application}', 'ApplicationController@reject')->name('applications.reject');
        });

        Route::resource('testimonials', TestimonialController::class);
        Route::resource('teammembers', TeammemberController::class);


        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/{user}/profile', 'ProfileController@myprofile')->name('profile.myprofile');
        Route::get('dashboard', 'HomeController@dashboard')->name('home.dashboard');
        Route::get('frontend', 'HomeController@frontend')->name('home.frontend');


        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index')->name('users.index');
            Route::get('/create', 'UserController@create')->name('users.create');
            Route::post('/create', 'UserController@store')->name('users.store');
            Route::get('/{user}/show', 'UserController@show')->name('users.show');
            Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UserController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UserController@destroy')->name('users.destroy');
        });


        // enrollment routs
        Route::group(['prefix' => 'enrollments'], function () {
            Route::get('/verification', 'EnrollmentController@verification')->name('enrollments.verification');
            Route::get('/enroll', 'EnrollmentController@enroll')->name('enrollments.enroll');
            Route::post('/store', 'EnrollmentController@store')->name('enrollments.store');
        });



        Route::group(['prefix' => 'courses'], function () {
            Route::get('/create', 'CourseController@create')->name('courses.create');
            Route::post('/create', 'CourseController@store')->name('courses.store');
            Route::get('/pending', 'CourseController@pending')->name('courses.pending');
            Route::get('/{course}/pendingshow', 'CourseController@pendingshow')->name('courses.pendingshow');
            Route::post('/{course}/approve', 'CourseController@approve')->name('courses.approve');
            Route::get('/{course}/watch', 'CourseController@watch')->name('courses.watch');
            Route::get('/{course}/edit', 'CourseController@edit')->name('courses.edit');
            Route::patch('/{course}/update', 'CourseController@update')->name('courses.update');
            Route::delete('/{course}/delete', 'CourseController@destroy')->name('courses.destroy');
        });



        //Cart rout
        Route::group(['prefix' => 'carts'], function () {
            Route::get('/', 'CartController@index')->name('cart.index');
            Route::post('/addtocart/{course}', 'CartController@store')->name('cart.store');
            Route::post('{row}/remove', 'CartController@remove')->name('cart.remove');
            Route::post('checkout', 'CartController@checkout')->name('cart.checkout');
            Route::get('checkoutpage', 'CartController@checkoutpage')->name('cart.checkoutpage');
            Route::get('enroll/{order_id}', 'CartController@enroll')->name('cart.enroll');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('lessons', LessonController::class);
        Route::resource('categories', CategoryController::class);
    });

    Route::resource('reviews', ReviewController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('batches', BatchController::class);
});

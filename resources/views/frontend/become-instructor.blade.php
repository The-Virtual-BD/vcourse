@extends('frontend.layouts.app')

@section('content')

        <section class="section section--bg-offwhite-one top-bg overflow-hidden sucessfullInstructor pb-0">
            <div class="container">
                <h2 class="font-title--md text-center mx-auto">How You Will Become Successful Instructor</h2>
                <div class="row feature my-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="cardFeature cardFeature--center">
                            <div class="cardFeature__icon cardFeature__icon--bg-b">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                            </div>
                            <h5 class="font-title--xs">Upload Course</h5>
                            <p class="font-para--lg">Upload a course that demonstrates your knowledge and includes a proper guideline.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cardFeature cardFeature--center">
                            <div class="cardFeature__icon cardFeature__icon--bg-g">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h5 class="font-title--xs">Inspire Students</h5>
                            <p class="font-para--lg">Your interesting initial introduction lecture will motivate and inspire your students.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cardFeature cardFeature--center">
                            <div class="cardFeature__icon cardFeature__icon--bg-b">
                                <svg width="20" height="32" viewbox="0 0 20 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.875 2V30" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.4375 7.09082H6.59375C5.37541 7.09082 4.20697 7.56014 3.34548 8.39553C2.48398 9.23092 2 10.3639 2 11.5454C2 12.7268 2.48398 13.8598 3.34548 14.6952C4.20697 15.5306 5.37541 15.9999 6.59375 15.9999H13.1562C14.3746 15.9999 15.543 16.4692 16.4045 17.3046C17.266 18.14 17.75 19.273 17.75 20.4545C17.75 21.6359 17.266 22.7689 16.4045 23.6043C15.543 24.4397 14.3746 24.909 13.1562 24.909H2" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <h5 class="font-title--xs">Earn Money</h5>
                            <p class="font-para--lg">Let us begin with Vcourse and gain money because we are paying for instructors.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section__overlay">
                <span class="section__overlay--shape-01">
                    <img src="dist/images/shape/circle3.png" alt="shape circle">
                </span>
            </div>
        </section>

        <!-- Call To Action Starts Here -->
        <section class="section section--bg-white calltoaction">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 mx-auto text-center">
                        <h5 class="font-title--sm mb-4">Become an Instructor</h5>
                        @auth
                            @if (Auth::user()->applied == 1)
                            <p class="my-4 font-para--lg text-success">
                                You allready applied to be an Instructor.
                            </p>
                            @endif
                        @endauth
                        <div class="row">
                            <form method="post" @guest action="{{ route('register.perform') }}" @endguest @auth action="{{ route('users.update', Auth::user()->id) }}" @endauth enctype="multipart/form-data">
                                @csrf

                                @guest
                                @method('post')
                                @endguest

                                @auth
                                @method('patch')
                                @endauth


                                @guest

                                {{-- name --}}
                                <div class="form-element" ><!--success-->
                                    <div class="form-alert">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="Your Name" name="name" id="name">
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="form-element"  id="email-element"><!--error-->
                                    <div class="form-alert ">
                                        <label for="email">Email</label>
                                        <span id="email-alert"></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="email" placeholder="example@mail.com" id="email" name="email">
                                        <div class="form-alert-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle d-none">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>


                                {{-- phone number --}}
                                <div class="form-element" id="phone_number-element">
                                    <div class="form-alert">
                                        <label for="phone_number">Phone</label>
                                        <span class="" id="phone_number-alert"></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="0123456789" id="phone_number" name="phone_number">
                                    </div>
                                </div>


                                {{-- username --}}
                                <div class="form-element " id="username-element">
                                    <div class="form-alert">
                                        <label for="username">Username</label>
                                        <span id="username-alert" class=""></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="username" id="username" name="username">
                                    </div>
                                </div>

                                @endguest


                                {{-- exparties --}}
                                <div class="form-element" ><!--success-->
                                    <div class="form-alert">
                                        <label for="experties">Experties</label>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="Your Experties" name="experties" id="experties" required>
                                    </div>
                                </div>


                                {{-- cv --}}
                                <div class="form-element" ><!--success-->
                                    <div class="form-alert">
                                        <label for="cv">Resume</label>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="file" placeholder="Your Experties" name="cv" id="cv">
                                    </div>
                                </div>


                                {{-- only for gest user --}}
                                @guest
                                {{-- password --}}
                                <div class="form-element"><!--active-->
                                    <label for="password" class="w-100" style="text-align: left;">Password</label>
                                    <div class="form-alert-input">
                                        <input type="password" placeholder="Type here..." id="password" name="password">
                                        <div class="form-alert-icon" onclick="showPassword('password',this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- confirm password --}}
                                <div class="form-element">
                                    <label for="password_confirmation" class="w-100" style="text-align: left;">Confirm password</label>
                                    <div class="form-alert-input">
                                        <input type="password" placeholder="Type here..." id="password_confirmation" name="password_confirmation">
                                        <div class="form-alert-icon" onclick="showPassword('password_confirmation',this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @endguest


                                {{-- agree to terms and conditions --}}
                                <div class="form-element d-flex align-items-center terms">
                                    <input class="checkbox-primary me-1" type="checkbox" id="agree" required>
                                    <label for="agree" class="text-secondary mb-0">Accept the <a href="#" style="text-decoration: underline;" class="">Terms</a> and <a href="{{route('home.privacy_policy')}}" style="text-decoration: underline;">Privacy Policy</a></label>
                                </div>

                                <div class="form-element">
                                    <button type="submit" class="button button-lg button--primary w-100">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection


@section('script')
<script>
    $('document').ready(function(){

        var username_state = false;
        var email_state = false;
        var phone_number = false;
        let _token = $('input[name="_token"]').val();



        //email check----------
        $('#email').on('blur', function(){
            var email = $('#email').val();

            if (email == '') {
                email_state = false;
                return;
            }

            $.ajax({
            url: '{{ route('register.mailcheck') }}',
            type: 'post',
            data: {
                'email_check' : 1,
                'email' : email,
                _token: _token,
            },

            success: function(response){
                if (response == 'taken' ) {
                email_state = false;
                $('#email-element').removeClass("success").addClass("error");
                $('#email-alert').text('Sorry... Email already taken');
                }else if (response == 'not_taken') {
                email_state = true;
                $('#email-element').removeClass("error").addClass("success");
                $('#email-alert').text('Email available');
                }
            }

            });

        });
        // email check end

        //  username check
        $('#username').on('blur', function(){
            var username = $('#username').val();
            if (username == '') {
                username_state = false;
                return;
            }

            $.ajax({
                url: '{{ route('register.usercheck') }}',
                type: 'post',
                data: {
                    'username_check' : 1,
                    'username' : username,
                    _token: _token,
                },
                success: function(response){
                if (response == 'taken' ) {
                username_state = false;
                $('#username-element').removeClass("success").addClass("error");
                $('#username-alert').text('Sorry... username already taken');
                }else if (response == 'not_taken') {
                username_state = true;
                $('#username-element').removeClass("error").addClass("success");
                $('#username-alert').text('Username available');
                }
            }
            });

        });
        // username check end

        //  phone_number check
        $('#phone_number').on('blur', function(){
            var phone_number = $('#phone_number').val();
            if (phone_number == '') {
                phone_number_state = false;
                return;
            }

            $.ajax({
                url: '{{ route('register.phonecheck') }}',
                type: 'post',
                data: {
                    'phone_number_check' : 1,
                    'phone_number' : phone_number,
                    _token: _token,
                },
                success: function(response){
                if (response == 'taken' ) {
                phone_number_state = false;
                $('#phone_number-element').removeClass("success").addClass("error");
                $('#phone_number-alert').text('Sorry... Phone Number already taken');
                }else if (response == 'not_taken') {
                phone_number_state = true;
                $('#phone_number-element').removeClass("error").addClass("success");
                $('#phone_number-alert').text('Phone Number Available');
                }
            }
            });

        });
        // username check end

    });
</script>
@endsection

@extends('frontend.layouts.app')
@section('content')
    <!-- SignUp Area Starts Here -->
    <section class="signup-area overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-md-center">
                <div class="col-lg-5 order-2 order-lg-0">
                    <div class="signup-area-textwrapper">
                        <h2 class="font-title--md mb-0">Sign Up</h2>
                        <p class="mt-2 mb-lg-4 mb-3">Already have account? <a href="{{route('login.show')}}" class="text-black-50">Sign In</a></p>
                        <p><span class="text-danger">*</span> Signed fields are required.</p>
                        <div class=" mb-5">


                            <form method="post" action="{{ route('register.perform') }}">
                                @csrf
                                @method('post')

                                {{-- name --}}
                                <div class="form-element" id="name-element"><!--success-->
                                    <div class="form-alert">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <span id="name-alert"></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="Your Name" name="name" id="name">
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="form-element"  id="email-element"><!--error-->
                                    <div class="form-alert ">
                                        <label for="email">Email<span class="text-danger">*</span></label>
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
                                        <label for="phone_number">Phone<span class="text-danger">*</span></label>
                                        <span class="" id="phone_number-alert"></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="0123456789" id="phone_number" name="phone_number" maxlength="11">
                                    </div>
                                </div>


                                {{-- username --}}
                                <div class="form-element " id="username-element">
                                    <div class="form-alert">
                                        <label for="username">Username<span class="text-danger">*</span></label>
                                        <span id="username-alert" class=""></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="text" placeholder="username" id="username" name="username" required>
                                    </div>
                                </div>

                                {{-- password --}}
                                <div class="form-element" id="password-element"><!--active-->
                                    <div class="form-alert ">
                                        <label for="password" style="text-align: left;">Password<span class="text-danger">*</span></label>
                                        <span id="password-alert"></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="password" placeholder="Type here..." id="password" name="password" minlength="8">
                                        <div class="form-alert-icon" onclick="showPassword('password',this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- confirm password --}}
                                <div class="form-element" id="password_confirmation-element">
                                    <div class="form-alert ">
                                        <label for="password_confirmation" style="text-align: left;">Confirm password<span class="text-danger">*</span></label>
                                        <span id="password_confirmation-alert"></span>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="password" placeholder="Type here..." id="password_confirmation" name="password_confirmation" required>
                                        <div class="form-alert-icon" onclick="showPassword('password_confirmation',this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- agree to terms and conditions --}}
                                <div class="form-element d-flex align-items-center terms">
                                    <input class="checkbox-primary me-1" type="checkbox" id="agree" required>
                                    <label for="agree" class="text-secondary mb-0">Accept the <a href="#" style="text-decoration: underline;" class="">Terms</a> and <a href="{{route('home.privacy_policy')}}" style="text-decoration: underline;">Privacy Policy</a></label>
                                </div>

                                <div class="form-element">
                                    <button type="submit" id="signup-btn" class="button button-lg button--primary w-100">Signup</button>
                                </div>


                                {{-- Socila Login --}}
                                <span class="d-block text-center text-secondary">or sign up with</span>
                                <div class="d-flex align-items-center flex-wrap mt-3 signinButtons justify-content-center">
                                    <a href="{{route('auth.facebookRedirect')}}" class="d-none text-secondary align-items-center justify-content-center signup-with border fb rounded-1" style="margin-right: 20px">
                                        <svg class="me-2" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18 9C18 4.02891 13.9711 0 9 0C4.02891 0 0 4.02891 0 9C0 13.9711 4.02891 18 9 18C9.05273 18 9.10547 18 9.1582 17.9965V10.9934H7.22461V8.73984H9.1582V7.08047C9.1582 5.15742 10.3324 4.10977 12.048 4.10977C12.8707 4.10977 13.5773 4.16953 13.7812 4.19766V6.20859H12.6C11.6684 6.20859 11.4855 6.65156 11.4855 7.30195V8.73633H13.718L13.4262 10.9898H11.4855V17.652C15.2473 16.5727 18 13.1098 18 9V9Z" fill="#0078FF"></path>
                                        </svg>

                                        Facebook
                                    </a>
                                    <a href="{{route('auth.googleRedirect')}}" class="d-flex text-secondary align-items-center justify-content-center signup-with border google rounded-1">
                                        <svg class="me-2" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clipOne)">
                                                <path d="M3.98918 11.378L3.36263 13.717L1.07258 13.7654C0.388195 12.496 0 11.0437 0 9.50034C0 8.00793 0.362953 6.60055 1.00631 5.36133H1.0068L3.04559 5.73511L3.9387 7.76166C3.75177 8.30661 3.64989 8.89161 3.64989 9.50034C3.64996 10.161 3.76963 10.794 3.98918 11.378Z" fill="#FBBB00"></path>
                                                <path d="M17.8426 7.81836C17.946 8.36279 17.9999 8.92504 17.9999 9.49967C17.9999 10.144 17.9321 10.7725 17.8031 11.3788C17.365 13.4419 16.2202 15.2434 14.6343 16.5182L14.6338 16.5177L12.0659 16.3867L11.7024 14.1179C12.7547 13.5007 13.5771 12.535 14.0103 11.3788H9.19775V7.81836H14.0805H17.8426Z" fill="#518EF8"></path>
                                                <path d="M14.6341 16.5183L14.6346 16.5188C13.0922 17.7585 11.133 18.5003 9.00017 18.5003C5.57275 18.5003 2.59288 16.5846 1.07275 13.7654L3.98935 11.3779C4.74939 13.4064 6.70616 14.8503 9.00017 14.8503C9.9862 14.8503 10.91 14.5838 11.7026 14.1185L14.6341 16.5183Z" fill="#28B446"></path>
                                                <path d="M14.7447 2.57197L11.8291 4.95894C11.0087 4.44615 10.039 4.14992 9.00003 4.14992C6.65409 4.14992 4.66073 5.66013 3.93876 7.76131L1.00684 5.36098H1.00635C2.50421 2.47307 5.52167 0.5 9.00003 0.5C11.1838 0.5 13.186 1.27787 14.7447 2.57197Z" fill="#F14336"></path>
                                            </g>
                                            <defs>
                                                <clipPath>
                                                    <rect width="18" height="18" fill="white" transform="translate(0 0.5)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        Google
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-0">
                    <div class="signup-area-image">
                        <img src="{{asset('images/frontimages/signup/Illustration.png')}}" alt="Illustration Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SignUp Area Ends Here -->

    <!-- Dot Images Starts Here -->
    <div class="dot-images">
        <img src="{{asset('images/frontimages/shape/dots/dots-img-05.png')}}" alt="shape" class="img-fluid first-dotimage">
        <img src="{{asset('images/frontimages/shape/dots/dots-img-07.png')}}" alt="shape" class="img-fluid second-dotimage">
    </div>
    <!-- Dot Images Ends Here -->
@endsection


@section('script')
<script>
    $('document').ready(function(){

        var name_state = false;
        var username_state = false;
        var email_state = false;
        var phone_number_state = false;
        var password_state = false;

        var formReady = false;
        console.log(formReady);

        let _token = $('input[name="_token"]').val();
        const nameElement = $('#name-element');
        const nameAlert = $('#name-alert');
        const emailElement = $('#email-element');
        const emailAlert = $('#email-alert');
        const usernameElement = $('#username-element');
        const usernameAlert = $('#username-alert');
        const phoneNumberElement = $('#phone_number-element');
        const phoneNumberAlert = $('#phone_number-alert');
        const passwordElement = $('#password-element');
        const passwordAlert = $('#password-alert');
        const passwordConElement = $('#password_confirmation-element');
        const passwordConAlert = $('#password_confirmation-alert');
        let signupBtn = $('#signup-btn');

        signupBtn.text('Please Fillup All Filds & Accept Terms And Conditions');
        signupBtn.prop("disabled",true);

        //  Name check
        $('#name').on('blur', function(){
            var name = $('#name').val();
            if (name.length == 0) {
                nameElement.removeClass("success").addClass("error");
                nameAlert.text('Required');
                return;
            }
            nameElement.removeClass("error").addClass("success");
            nameAlert.text(' ');
            name_state = true;
        });
        // name check end

        //  phone_number check
        $('#phone_number').on('keyup', function(){
            var phone_number = $('#phone_number').val();

            if (phone_number.length < 11) {
                phoneNumberElement.removeClass("success").addClass("error");
                phoneNumberAlert.text('Must be 11 digit, you give '+phone_number.length);
                return;
            }

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
                phoneNumberElement.removeClass("success").addClass("error");
                phoneNumberAlert.text('Sorry... Phone Number already taken');
                }else if (response == 'not_taken') {
                phone_number_state = true;
                phoneNumberElement.removeClass("error").addClass("success");
                phoneNumberAlert.text('Phone Number Available');
                }
            }
            });

        });
        // phone check end

        //email check----------
        $('#email').on('keyup', function(){
            var email = $('#email').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(email)) {
                emailAlert.text('Not a valid email');
                emailElement.removeClass("success").addClass("error");
                return;
            }

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
        $('#username').on('keyup', function(){
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


        // Password Check
        $('#password').on('keyup', function () {
            var password = $('#password').val();
            var passwordCon = $('#password_confirmation').val();

            if (password.length < 8) {
                passwordElement.removeClass("success").addClass("error");
                passwordAlert.text('Minimum 8 digit, you give '+password.length);
                return;
            }
            passwordElement.removeClass("error").addClass("success");
            passwordAlert.text('');

            if (password != passwordCon) {
                passwordConElement.removeClass("success").addClass("error");
                passwordConAlert.text('Didn\'t Match');
                return;
            }else if(password == passwordCon){
                passwordConElement.removeClass("error").addClass("success");
                passwordConAlert.text('Matched');
                password_state = true;
            }

        });

        // Password Confirm
        $('#password_confirmation').on('keyup', function () {
            var password = $('#password').val();
            var passwordCon = $('#password_confirmation').val();

            if (password != passwordCon) {
                passwordConElement.removeClass("success").addClass("error");
                passwordConAlert.text('Didn\'t Match');
                return;
            }
            passwordConElement.removeClass("error").addClass("success");
            passwordConAlert.text('Matched');
            password_state = true;
            formReady = true;

        });


        $("#agree").change(function() {
            if(this.checked) {
                signupBtn.text('Signup');
                signupBtn.prop("disabled",false);
            }else{
                signupBtn.text('Please Fillup All Filds & Accept Terms And Conditions');
                signupBtn.prop("disabled",true);
            }
        });











        //saving data
        // $('#reg_btn').on('click', function(){
        //     var username = $('#username').val();
        //     var email = $('#email').val();
        //     var password = $('#password').val();
        //     if (username_state == false || email_state == false) {
        //     $('#error_msg').text('Fix the errors in the form first');
        //     }else{
        //     // proceed with form submission
        //     $.ajax({
        //         url: 'register.php',
        //         type: 'post',
        //         data: {
        //             'save' : 1,
        //             'email' : email,
        //             'username' : username,
        //             'password' : password,
        //         },
        //         success: function(response){
        //             alert('user saved');
        //             $('#username').val('');
        //             $('#email').val('');
        //             $('#password').val('');
        //         }
        //     });
        //     }
        // });

    });
</script>
@endsection



@extends('frontend.layouts.app')
@section('content')

        <!-- Reset Password Area Starts Here -->
        <section class="section signup-area signin-area section-padding overflow-hidden" style="height: 100vh;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-2 order-lg-0">
                        <h2 class="font-title--md mb-3">Reset Password</h2>

                        <form action="{{route('password.update')}}" method="POST">
                            @csrf
                            @method('post')
                            <div class="form-element" id="new-pass-element">
                                <div class="form-alert ">
                                    <label for="new-pass">Password<span class="text-danger">*</span></label>
                                    <span id="new-pass-alert"></span>
                                </div>
                                <div class="form-alert-input">
                                    <input type="password" name="password" placeholder="Type here..." id="new-pass" class="visibility" required>
                                    <div class="form-alert-icon" onclick="showPassword('new-pass',this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="form-element" id="new-password-element">
                                <div class="form-alert ">
                                    <label for="new-password">Confirm password<span class="text-danger">*</span></label>
                                    <span id="new-password-alert"></span>
                                </div>
                                <div class="form-alert-input">
                                    <input type="password" name="password_confirmation" placeholder="Type here..." id="new-password" class="visibility" required>
                                    <div class="form-alert-icon" onclick="showPassword('new-password',this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="email" value="{{app('request')->input('email')}}">
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="form-element">
                                <button type="submit" id="reset-btn" class="button button-lg button--primary w-100">Reset Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-7 order-1 order-lg-0">
                        <div class="signup-area-image">
                            <img src="{{asset('images/frontimages/signup/Illustration.png')}}" alt="Illustration Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Reset Password Area Ends Here -->

        <!-- Dot Images Starts Here -->
        <div class="dot-images">
            <img src="{{asset('images/frontimages/shape/dots/dots-img-11.png')}}" alt="shape" class="img-fluid second-dotimage">
        </div>
        <!-- Dot Images Ends Here -->
@endsection


@section('script')
<script>
    $(document).ready(function () {


        const newPassElement = $('#new-pass-element');
        const newPassAlert = $('#new-pass-alert');
        const newPasswordElement = $('#new-password-element');
        const newPasswordAlert = $('#new-password-alert');

        const resetBtn = $('#reset-btn');
        resetBtn.prop("disabled",true);


        // Password Check
        $('#new-pass').on('keyup', function () {
            var password = $('#new-pass').val();
            var passwordCon = $('#new-password').val();

            if (password.length < 8) {
                newPassElement.removeClass("success").addClass("error");
                newPassAlert.text('Minimum 8 digit, you give '+password.length);
                resetBtn.prop("disabled",true);
                return;
            }
            newPassElement.removeClass("error").addClass("success");
            newPassAlert.text('');

            if (password != passwordCon) {
                newPasswordElement.removeClass("success").addClass("error");
                newPasswordAlert.text('Didn\'t Match');
                resetBtn.prop("disabled",true);
                return;
            }else if(password == passwordCon){
                newPasswordElement.removeClass("error").addClass("success");
                newPasswordAlert.text('Matched');
                resetBtn.prop("disabled",false);
            }

        });

        // Password Confirm
        $('#new-password').on('keyup', function () {
            var password = $('#new-pass').val();
            var passwordCon = $('#new-password').val();

            if (password != passwordCon) {
                passwordConElement.removeClass("success").addClass("error");
                passwordConAlert.text('Didn\'t Match');
                resetBtn.prop("disabled",true);
                return;
            }
            newPasswordElement.removeClass("error").addClass("success");
            newPasswordAlert.text('Matched');
            resetBtn.prop("disabled",false);


        });
    });
</script>
@endsection


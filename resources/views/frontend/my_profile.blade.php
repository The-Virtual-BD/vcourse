@extends('frontend.layouts.app')


@section('content')
    <!-- Students Info area Starts Here -->
    <section class=" students-info pt-0">
        <div class="container">
            <div class="students-info-intro">
                @include('frontend.inc.messages')
                <!-- Nav  -->
                <nav class="students-info-intro__nav">
                    <div class="nav" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="asstudent-tab" data-bs-toggle="tab" data-bs-target="#asstudent"
                            type="button" role="tab" aria-controls="asstudent" aria-selected="true">As Student</button>
                        @role('instructor')
                            <button class="nav-link" id="nav-coursesall-tab" data-bs-toggle="tab" data-bs-target="#asinstructor"
                                type="button" role="tab" aria-controls="asinstructor" aria-selected="false">As
                                Instructor</button>
                        @endrole
                    </div>
                </nav>
            </div>
            {{-- Info main --}}
            <div class="students-info-main">
                <div class="tab-content" id="nav-tabContent">
                    {{-- tab for student --}}
                    <div class="tab-pane fade show active" id="asstudent" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container">
                            {{-- if user not verified --}}
                            @if ($user->email_verified_at == null)
                                <div class="row">
                                    <div class="">
                                        <div class="card-header  d-flex justify-content-between">
                                            {{ __('Verify Your Email Address') }}
                                            <form class="" method="POST" action="{{ route('verification.send') }}">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm">{{ __('Send verification Email') }}</button>.
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @endif


                            <div class="students-info-intro">
                                <!-- profile Details   -->
                                <div class="students-info-intro__profile">
                                    <div class="students-info-intro-start position-relative">
                                        <form id="studentppform" method="POST"
                                            action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data"
                                            class="d-none">
                                            @method('patch')
                                            @csrf
                                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                            <input type="file" name="profile_picture" id="selectedFile"
                                                style="display: none;" />
                                            <input type="submit" value="Set" class="btn btn-primary btn-sm"
                                                id="submitPP">
                                        </form>
                                        {{-- image --}}
                                        <div class="image" id="studentpp">
                                            {{-- if user dont have picture --}}
                                            @if ($user->profile_picture == null)
                                                <img src="{{ asset('images/avatar.svg') }}" alt="Student">
                                            @else
                                                <img src="{{ asset($user->profile_picture) }}" alt="Student">
                                            @endif


                                            <button class="btn btn-sm btn-primary" id="ppChangeBtn"
                                                onclick="document.getElementById('selectedFile').click();">Change</button>
                                        </div>
                                        <div class="text">
                                            <div class="">
                                                <i id="studentnamepen" class="ti-pencil"></i>
                                                <h5 id="studentname">{{ $user->name }}</h5>
                                                <form id="studentnameform" method="post"
                                                    action="{{ route('users.update', $user->id) }}" class="d-none">
                                                    @method('patch')
                                                    @csrf
                                                    <input class="form-control mb-1" name="name" id=""
                                                        value="{{ $user->name }}">
                                                    <input type="submit" value="Save" class="btn btn-primary btn-sm">
                                                </form>
                                            </div>

                                            <p>
                                                @if ($user->designation == null)
                                                    Student
                                                @else
                                                    {{ $user->designation }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class=" students-info-intro-end">
                                            <div class="enrolled-courses">
                                                <div class="enrolled-courses-icon">
                                                    <svg width="28" height="26" viewbox="0 0 28 26" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1 1.625H8.8C10.1791 1.625 11.5018 2.15764 12.477 3.10574C13.4521 4.05384 14 5.33974 14 6.68056V24.375C14 23.3694 13.5891 22.405 12.8577 21.6939C12.1263 20.9828 11.1343 20.5833 10.1 20.5833H1V1.625Z"
                                                            stroke="#1089FF" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M27 1.625H19.2C17.8209 1.625 16.4982 2.15764 15.523 3.10574C14.5479 4.05384 14 5.33974 14 6.68056V24.375C14 23.3694 14.4109 22.405 15.1423 21.6939C15.8737 20.9828 16.8657 20.5833 17.9 20.5833H27V1.625Z"
                                                            stroke="#1089FF" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="enrolled-courses-text">
                                                    <h6 class="font-title--xs">{{ count($enrolledCourses) }}</h6>
                                                    <p class="fs-6 mt-1">Enrolled Courses</p>
                                                </div>
                                            </div>
                                            <div class="completed-courses">
                                                <div class="completed-courses-icon">
                                                    <svg width="22" height="26" viewbox="0 0 22 26"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M19.1716 3.95235C19.715 4.14258 20.078 4.65484 20.078 5.23051V13.6518C20.078 16.0054 19.2226 18.2522 17.7119 19.9929C16.9522 20.8694 15.9911 21.552 14.9703 22.1041L10.5465 24.4938L6.11516 22.1028C5.09312 21.5508 4.13077 20.8694 3.36983 19.9916C1.85791 18.2509 1 16.0029 1 13.6468V5.23051C1 4.65484 1.36306 4.14258 1.90641 3.95235L10.0902 1.07647C10.3811 0.974511 10.6982 0.974511 10.9879 1.07647L19.1716 3.95235Z"
                                                            stroke="#00AF91" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M7.30688 12.4002L9.65931 14.7538L14.5059 9.90723"
                                                            stroke="#00AF91" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="completed-courses-text">
                                                    <h5 class="font-title--xs">{{ count($completedCourses) }}</h5>
                                                    <p class="fs-6 mt-1">Completed Courses</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nav  -->
                                <nav class="students-info-intro__nav">
                                    <div class="nav" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="true">My Profile</button>

                                        <button class=" nav-link" id="nav-activecourses-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-activecourses" type="button" role="tab"
                                            aria-controls="nav-activecourses" aria-selected="false">
                                            Enrolled Courses
                                        </button>

                                        <button class="nav-link" id="nav-completedcourses-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-completedcourses" type="button" role="tab"
                                            aria-controls="nav-completedcourses" aria-selected="false">
                                            Completed Courses
                                        </button>
                                        <button class="nav-link" id="nav-runningcourses-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-runningcourses" type="button" role="tab"
                                            aria-controls="nav-runningcourses" aria-selected="false">
                                            Running Courses
                                        </button>

                                        <button class="d-none nav-link" id="nav-setting-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-setting" type="button" role="tab"
                                            aria-controls="nav-setting" aria-selected="false">Setting</button>
                                        <button class="d-none nav-link" id="nav-purchase-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-purchase" type="button" role="tab"
                                            aria-controls="nav-purchase" aria-selected="false">Purchase History</button>

                                    </div>
                                </nav>
                            </div>

                            <div class="students-info-main ">
                                <div class="tab-content" id="nav-tabContent">

                                    {{-- about me --}}
                                    {{-- error in this div --}}

                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="tab-content__profile">
                                            <div class="tab-content__profile-content">
                                                <div class="about-student">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="font-title--card">About Me</h6>
                                                        <i id="studentaboutpen" class="ti-pencil"></i>
                                                    </div>
                                                    <div class="">

                                                        @if ($user->about_me == null)
                                                            <p class="font-para--md" id="studentabout">
                                                                Please say something about you.
                                                            </p>
                                                            <form id="studentaboutform" method="post"
                                                                action="{{ route('users.update', $user->id) }}"
                                                                class="d-none">
                                                                @method('patch')
                                                                @csrf
                                                                <textarea class="form-control mb-1" name="about_me" id="about_me" cols="30" rows="4" value=""></textarea>
                                                                <input type="submit" value="Save"
                                                                    class="btn btn-primary btn-sm mt-3">
                                                            </form>
                                                        @else
                                                            <div class="" id="studentabout">
                                                                {!! $user->about_me !!}
                                                            </div>

                                                            <form id="studentaboutform" method="post"
                                                                action="{{ route('users.update', $user->id) }}"
                                                                class="d-none">
                                                                @method('patch')
                                                                @csrf
                                                                <textarea class="form-control mb-1" name="about_me" id="about_me" cols="30" rows="4"
                                                                    value="{{ $user->about_me ?? '' }}">{!! $user->about_me !!}</textarea>
                                                                <input type="submit" value="Save"
                                                                    class="btn btn-primary btn-sm mt-3">
                                                            </form>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>


                                            {{-- --------------------------------------------------------------------- --}}
                                            <div class="tab-content__profile-content">
                                                <div class="info-student">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="font-title--card">Information</h6>
                                                        <i id="studentinfopen" class="ti-pencil"></i>
                                                    </div>
                                                    <div id="studentinfo" class="">
                                                        <dl class="row my-0 info-student-topic">
                                                            <dt class="col-sm-4">
                                                                <span>Name</span>
                                                            </dt>
                                                            <dd class="col-sm-8">
                                                                <p>{{ $user->name }}</p>
                                                            </dd>
                                                        </dl>
                                                        <dl class="row my-0 info-student-topic">
                                                            <dt class="col-sm-4">
                                                                <span>E-mail</span>
                                                            </dt>
                                                            <dd class="col-sm-8">
                                                                <p>{{ $user->email }}</p>
                                                            </dd>
                                                        </dl>
                                                        <dl class="row my-0 info-student-topic">
                                                            <dt class="col-sm-4">
                                                                <span>Phone Number</span>
                                                            </dt>
                                                            <dd class="col-sm-8">
                                                                <p>{{ $user->phone_number }}</p>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="d-none" id="studentinfoform">
                                                        <form method="post"
                                                            action="{{ route('users.update', $user->id) }}"
                                                            class="">
                                                            @method('patch')
                                                            @csrf
                                                            <dl class="row my-0 info-student-topic">
                                                                <dt class="col-sm-4">
                                                                    <span>Name</span>
                                                                </dt>
                                                                <dd class="col-sm-8">
                                                                    <input type="text" name="name" id=""
                                                                        class="form-control"
                                                                        placeholder="{{ $user->name }}">
                                                                </dd>
                                                            </dl>
                                                            <dl class="row my-0 info-student-topic">
                                                                <dt class="col-sm-4">
                                                                    <span>E-mail</span>&nbsp;<span class=""
                                                                        id="email-alert"></span>
                                                                </dt>
                                                                <dd class="col-sm-8">
                                                                    <input type="email" name="email"
                                                                        value="{{ $user->email }}" id="email"
                                                                        class="form-control"
                                                                        placeholder="{{ $user->email }}">
                                                                </dd>
                                                            </dl>
                                                            <dl class="row my-0 info-student-topic">
                                                                <dt class="col-sm-4">
                                                                    <span>Phone Number</span>&nbsp;<span class=""
                                                                        id="phone_number_alert"></span>
                                                                </dt>
                                                                <dd class="col-sm-8">
                                                                    <input type="text" name="phone_number"
                                                                        id="phone_number" class="form-control"
                                                                        placeholder="{{ $user->phone_number }}">
                                                                </dd>
                                                            </dl>
                                                            <input type="submit" value="Save"
                                                                class="btn btn-primary btn-sm">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- enrolled courses --}}
                                    <div class="tab-pane fade" id="nav-activecourses" role="tabpanel"
                                        aria-labelledby="nav-activecourses-tab">
                                        <div class="row">
                                            @if ($enrolledCourses)
                                                @foreach ($enrolledCourses as $item)
                                                    @php
                                                        $course = $courses->find($item->id);
                                                    @endphp
                                                    <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                                                        @include('frontend.inc.course_showcase')
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="h2 p-5 text-center">No Enrolled Courses!</p>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- completed courses --}}
                                    <div class="tab-pane fade" id="nav-completedcourses" role="tabpanel"
                                        aria-labelledby="nav-completedcourses-tab">
                                        <div class="row">
                                            @if ($completedCourses)
                                                @foreach ($completedCourses as $item)
                                                    @php
                                                        $course = $courses->find($item->id);
                                                    @endphp
                                                    <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                                                        @include('frontend.inc.course_showcase')
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="h2 p-5 text-center">No Course Completed Yet!</p>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- running courses --}}
                                    <div class="tab-pane fade" id="nav-runningcourses" role="tabpanel"
                                        aria-labelledby="nav-runningcourses-tab">
                                        <div class="row">
                                            @if ($runningCourses)
                                                @foreach ($runningCourses as $item)
                                                    @php
                                                        $course = $courses->find($item->id);
                                                    @endphp
                                                    <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                                                        @include('frontend.inc.course_showcase')
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="h2 p-5 text-center">No Course Running!</p>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- settings --}}
                                    <div class="tab-pane fade" id="nav-setting" role="tabpanel"
                                        aria-labelledby="nav-setting-tab">
                                        <div class="row">
                                            <div class="col-lg-9 order-2 order-lg-0">
                                                <div class="white-bg">
                                                    <div class="students-info-form">
                                                        <h6 class="font-title--card">Your Information</h6>
                                                        <form action="#">
                                                            <div class="row g-3">
                                                                <div class="col-lg-6">
                                                                    <label for="fname">First Name</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Phillip" id="fname">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="lname">Last Name</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Bergson" id="lname">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" id="email"
                                                                        class="form-control"
                                                                        placeholder="phillip.bergson@gmail.com">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="do">What Do You Do</label>
                                                                    <input type="text" id="do"
                                                                        class="form-control" placeholder="UI/UX Designer">
                                                                </div>
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-lg-6">
                                                                    <label for="pnumber">Phone Number</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="+8801236-858966" id="pnumber">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="nationality">Nationality</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Bangladesh" id="nationality">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-lg-end justify-content-center mt-2">
                                                                <button class="button button-lg button--primary"
                                                                    type="submit">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="white-bg mt-4">
                                                    <div class="students-info-form">
                                                        <h6 class="font-title--card">Change Password</h6>
                                                        <form action="#">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="cpass">Current Password</label>
                                                                    <div class="input-with-icon">
                                                                        <input type="password" id="cpass"
                                                                            class="form-control"
                                                                            placeholder="Enter Password">
                                                                        <div class="input-icon"
                                                                            onclick="showPassword('cpass',this)">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewbox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-eye">
                                                                                <path
                                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                </path>
                                                                                <circle cx="12" cy="12"
                                                                                    r="3"></circle>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="npass">New Password</label>
                                                                    <div class="input-with-icon">
                                                                        <input type="password" id="npass"
                                                                            class="form-control"
                                                                            placeholder="Enter Password">
                                                                        <div class="input-icon"
                                                                            onclick="showPassword('npass',this)">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewbox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-eye">
                                                                                <path
                                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                </path>
                                                                                <circle cx="12" cy="12"
                                                                                    r="3"></circle>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="cnpass">Confirm New Password</label>
                                                                    <div class="input-with-icon">
                                                                        <input type="password" id="cnpass"
                                                                            class="form-control"
                                                                            placeholder="Enter Password">
                                                                        <div class="input-icon"
                                                                            onclick="showPassword('cnpass',this)">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewbox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-eye">
                                                                                <path
                                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                </path>
                                                                                <circle cx="12" cy="12"
                                                                                    r="3"></circle>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-lg-end justify-content-center mt-2">
                                                                <button class="button button-lg button--primary"
                                                                    type="submit">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
                                                <div class="white-bg">
                                                    <div class="change-image-wizard">
                                                        <div class="image mx-auto">
                                                            <img src="{{ asset('images/frontimages/user/user-img-01.jpg') }}"
                                                                alt="User">
                                                        </div>
                                                        <form action="#">
                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit"
                                                                    class="button button--primary-outline">CHANGE
                                                                    iMAGE</button>
                                                            </div>
                                                        </form>
                                                        <p>Image size should be under 1MB image ratio 200px.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- purchase history --}}
                                    <div class="tab-pane fade" id="nav-purchase" role="tabpanel"
                                        aria-labelledby="nav-purchase-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="purchase-area">
                                                    <div class="purchase-area-close">
                                                        <a href="#">
                                                            <svg width="12" height="12" viewbox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 1L1 11" stroke="#F15C4C" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1 1L11 11" stroke="#F15C4C" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-lg-center align-items-start flex-column flex-lg-row">
                                                        <div class="purchase-area-items">
                                                            <div
                                                                class="purchase-area-items-start d-flex align-items-lg-center flex-column flex-lg-row">
                                                                <div class="image">
                                                                    <a href="#">
                                                                        <img src="{{ asset('images/frontimages/courses/demo-img-03.png') }}"
                                                                            alt="Image">
                                                                    </a>
                                                                </div>
                                                                <div class="text d-flex flex-column flex-lg-row">
                                                                    <div class="text-main">
                                                                        <h6>
                                                                            <a href="#">Advanced Digital Comic
                                                                                Coloring Concepts & Techniques</a>
                                                                        </h6>
                                                                        <p>By <a href="instructorcourses.html">Kevin
                                                                                Gilbert</a></p>
                                                                    </div>
                                                                    <p>$87</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="purchase-area-items-start d-flex align-items-lg-center flex-column flex-lg-row">
                                                                <div class="image">
                                                                    <a href="#">
                                                                        <img src="{{ asset('images/frontimages/courses/demo-img-05.png') }}"
                                                                            alt="Image">
                                                                    </a>
                                                                </div>
                                                                <div class="text d-flex flex-column flex-lg-row">
                                                                    <div class="text-main">
                                                                        <h6>
                                                                            <a href="#">Advanced Digital Comic
                                                                                Coloring Concepts & Techniques</a>
                                                                        </h6>
                                                                        <p>By <a href="instructorcourses.html">Kevin
                                                                                Gilbert</a></p>
                                                                    </div>
                                                                    <p>$25</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="purchase-area-items-start mb-0 pb-2 d-flex align-items-lg-center flex-column flex-lg-row">
                                                                <div class="image">
                                                                    <a href="#">
                                                                        <img src="{{ asset('images/frontimages/courses/8.jpg') }}"
                                                                            alt="Image">
                                                                    </a>
                                                                </div>
                                                                <div class="text d-flex flex-column flex-lg-row">
                                                                    <div class="text-main">
                                                                        <h6>
                                                                            <a href="#">Adobe Illustrator CC –
                                                                                Advanced Training Course</a>
                                                                        </h6>
                                                                        <p>By <a href="instructorcourses.html">Kevin
                                                                                Gilbert</a></p>
                                                                    </div>
                                                                    <p>$14</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="purchase-area-items-end">
                                                            <p>11th Dec, 2020</p>
                                                            <dl class="row">
                                                                <dt class="col-sm-4">Subtotal</dt>
                                                                <dd class="col-sm-8">211 USD</dd>

                                                                <dt class="col-sm-4">Total Courses</dt>
                                                                <dd class="col-sm-8">
                                                                    03
                                                                </dd>

                                                                <dt class="col-sm-4">Payment Type</dt>
                                                                <dd class="col-sm-8">
                                                                    Credit Card
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12">
                                                <div class="purchase-area">
                                                    <div class="purchase-area-close">
                                                        <a href="#">
                                                            <svg width="12" height="12" viewbox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 1L1 11" stroke="#F15C4C" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1 1L11 11" stroke="#F15C4C" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-lg-center align-items-start flex-column flex-lg-row">
                                                        <div class="purchase-area-items">
                                                            <div
                                                                class="purchase-area-items-start mb-0 d-flex align-items-lg-center flex-column flex-lg-row">
                                                                <div class="image">
                                                                    <a href="#">
                                                                        <img src="{{ asset('images/frontimages/courses/8.jpg') }}"
                                                                            alt="Image">
                                                                    </a>
                                                                </div>
                                                                <div class="text d-flex flex-column flex-lg-row">
                                                                    <div class="text-main">
                                                                        <h6>
                                                                            <a href="#">Digital Art for Beginners -
                                                                                Unleash Your Creativity</a>
                                                                        </h6>
                                                                        <p>By <a href="instructorcourses.html">Kevin
                                                                                Gilbert</a></p>
                                                                    </div>
                                                                    <p>$14</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="purchase-area-items-end">
                                                            <p>3rd, 2021</p>
                                                            <dl class="row">
                                                                <dt class="col-sm-4">Subtotal</dt>
                                                                <dd class="col-sm-8">211 USD</dd>

                                                                <dt class="col-sm-4">Total Courses</dt>
                                                                <dd class="col-sm-8">
                                                                    03
                                                                </dd>

                                                                <dt class="col-sm-4">Payment Type</dt>
                                                                <dd class="col-sm-8">
                                                                    Credit Card
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-lg-5 mt-4">
                                            <div class="col-lg-12 text-center">
                                                <p style="color: #42414b !important; font-size: 18px !important;">
                                                    Yay! You have seen all your purchase history.
                                                    <svg width="31" height="31" viewbox="0 0 31 31"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d)">
                                                            <path
                                                                d="M15.8653 26.6346C23.1194 26.4329 28.8365 20.3887 28.6347 13.1346C28.433 5.8805 22.3888 0.163433 15.1347 0.365178C7.88061 0.566922 2.16355 6.61108 2.36529 13.8652C2.56704 21.1193 8.61119 26.8363 15.8653 26.6346Z"
                                                                fill="url(#paint0_radial)"></path>
                                                            <path
                                                                d="M15.8653 26.6346C23.1194 26.4329 28.8365 20.3887 28.6347 13.1346C28.433 5.8805 22.3888 0.163433 15.1347 0.365178C7.88061 0.566922 2.16355 6.61108 2.36529 13.8652C2.56704 21.1193 8.61119 26.8363 15.8653 26.6346Z"
                                                                fill="url(#paint1_linear)"></path>
                                                            <path
                                                                d="M28.0022 13.1522C28.1942 20.0569 22.7524 25.81 15.8477 26.002C8.94295 26.1941 3.18988 20.7523 2.99785 13.8476C2.80582 6.94284 8.24756 1.18977 15.1523 0.997737C22.057 0.805709 27.8101 6.24744 28.0022 13.1522Z"
                                                                stroke="#D67504" stroke-opacity="0.27"
                                                                stroke-width="1.26563"></path>
                                                        </g>
                                                        <path
                                                            d="M17.7944 8.07061C16.9534 8.34992 15.9151 8.39547 15.5022 8.40458C15.0893 8.39547 14.0449 8.34992 13.2069 8.07061C11.61 7.5393 9.03846 7.20231 7.07718 7.24785C5.62595 7.28429 4.12311 7.47859 3.18801 7.66683C2.77208 7.75184 2.50794 8.15866 2.6051 8.57156L2.70528 8.99963C2.76297 9.24859 2.95728 9.43379 3.20016 9.5188C3.32464 9.56434 3.44608 9.64632 3.50073 9.79205C3.66771 10.2444 4.57852 12.9252 5.07036 13.918C5.47415 14.7286 6.56712 15.4239 9.10829 15.436C12.7242 15.4512 13.9751 13.0588 14.5519 11.5165C14.6126 11.3556 14.7037 11.0459 14.7857 10.7454C14.9041 10.3173 15.1652 9.89526 15.2805 9.83454C15.3504 9.80115 15.4293 9.7708 15.5083 9.7708C15.5902 9.7708 15.6692 9.80115 15.739 9.83454C15.8544 9.89526 16.1094 10.3173 16.2278 10.7454C16.3098 11.0459 16.4008 11.3526 16.4616 11.5165C17.0354 13.0619 18.2893 15.4512 21.9021 15.436C24.4433 15.4269 25.5363 14.7317 25.9401 13.918C26.4319 12.9283 27.3397 10.2444 27.5097 9.79205C27.5644 9.64632 27.6828 9.56434 27.8072 9.5188C28.0501 9.43379 28.2414 9.24859 28.3021 8.99963L28.4023 8.56852C28.4964 8.15562 28.2323 7.7488 27.8194 7.66379C26.8843 7.47555 25.3814 7.28125 23.9302 7.24481C21.9598 7.20231 19.3913 7.5393 17.7944 8.07061Z"
                                                            fill="#261F11"></path>
                                                        <path
                                                            d="M17.1971 10.4655C17.273 12.2173 18.9792 13.8993 20.5731 14.2849C22.92 14.8526 24.6839 14.3456 25.6858 12.19C25.9864 11.5403 26.6331 10.1224 26.5906 9.36647C26.5177 8.05187 24.8509 8.2826 23.7853 8.25831C23.6699 8.25528 17.0908 8.07008 17.1971 10.4655Z"
                                                            fill="#574A2D"></path>
                                                        <path
                                                            d="M13.8691 10.4655C13.7932 12.2173 12.087 13.8993 10.4931 14.2849C8.1462 14.8526 6.38226 14.3456 5.38037 12.19C5.0798 11.5403 4.43313 10.1224 4.47563 9.36647C4.5485 8.05187 6.21528 8.2826 7.28093 8.25831C7.39326 8.25528 13.9754 8.07008 13.8691 10.4655Z"
                                                            fill="#574A2D"></path>
                                                        <g filter="url(#filter1_di)">
                                                            <path
                                                                d="M18.303 20.2245C17.9538 20.2245 17.5986 20.2002 17.2373 20.1455C16.8852 20.0939 16.6453 19.766 16.6969 19.4138C16.7485 19.0647 17.0734 18.8218 17.4286 18.8734C19.4628 19.177 21.2692 18.4089 22.0312 16.9121C22.1922 16.5964 22.5808 16.4719 22.8965 16.6328C23.2123 16.7937 23.3398 17.1824 23.1789 17.4981C22.3015 19.2165 20.4525 20.2245 18.303 20.2245Z"
                                                                fill="#823423"></path>
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d" x="0.65517" y="0.360352"
                                                                width="29.6901" height="29.6901"
                                                                filterunits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feflood flood-opacity="0" result="BackgroundImageFix">
                                                                </feflood>
                                                                <fecolormatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0">
                                                                </fecolormatrix>
                                                                <feoffset dy="1.70518"></feoffset>
                                                                <fegaussianblur stddeviation="0.852591"></fegaussianblur>
                                                                <fecolormatrix type="matrix"
                                                                    values="0 0 0 0 0.9 0 0 0 0 0.6165 0 0 0 0 0.19125 0 0 0 0.33 0">
                                                                </fecolormatrix>
                                                                <feblend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow"></feblend>
                                                                <feblend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow" result="shape"></feblend>
                                                            </filter>
                                                            <filter id="filter1_di" x="16.2636" y="16.5625"
                                                                width="7.41119" height="4.51454"
                                                                filterunits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feflood flood-opacity="0" result="BackgroundImageFix">
                                                                </feflood>
                                                                <fecolormatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0">
                                                                </fecolormatrix>
                                                                <feoffset dy="0.426295"></feoffset>
                                                                <fegaussianblur stddeviation="0.213148"></fegaussianblur>
                                                                <fecolormatrix type="matrix"
                                                                    values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.35 0">
                                                                </fecolormatrix>
                                                                <feblend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow"></feblend>
                                                                <feblend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow" result="shape"></feblend>
                                                                <fecolormatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                    result="hardAlpha"></fecolormatrix>
                                                                <feoffset dy="0.426295"></feoffset>
                                                                <fegaussianblur stddeviation="0.426295"></fegaussianblur>
                                                                <fecomposite in2="hardAlpha" operator="arithmetic"
                                                                    k2="-1" k3="1"></fecomposite>
                                                                <fecolormatrix type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                                                                </fecolormatrix>
                                                                <feblend mode="normal" in2="shape"
                                                                    result="effect2_innerShadow"></feblend>
                                                            </filter>
                                                            <radialgradient id="paint0_radial" cx="0"
                                                                cy="0" r="1"
                                                                gradientunits="userSpaceOnUse"
                                                                gradienttransform="translate(15.1347 0.365178) rotate(88.407) scale(26.2796)">
                                                                <stop stop-color="#EED919" offset="1"></stop>
                                                                <stop offset="1" stop-color="#F1BE08"></stop>
                                                            </radialgradient>
                                                            <lineargradient id="paint1_linear" x1="15.1347"
                                                                y1="0.365178" x2="15.8653" y2="26.6346"
                                                                gradientunits="userSpaceOnUse">
                                                                <stop stop-color="white" offset="1"
                                                                    stop-opacity="0.52"></stop>
                                                                <stop offset="1" stop-color="white" stop-opacity="0">
                                                                </stop>
                                                                <stop offset="1" stop-color="white" stop-opacity="0">
                                                                </stop>
                                                            </lineargradient>
                                                        </defs>
                                                    </svg>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>

                    {{-- tab only for instructor --}}
                    @role('instructor')
                        <div class="tab-pane fade" id="asinstructor" role="tabpanel" aria-labelledby="asinstructor-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="instructor-courses-instructor">
                                            <div id="instructorpp" class="instructor-image mx-auto text-center">
                                                @if ($user->profile_picture == null)
                                                    <img src="{{ asset('images/avatar.svg') }}" alt="Instructor">
                                                @else
                                                    <img src="{{ asset($user->profile_picture) }}" alt="Instructor">
                                                @endif
                                            </div>
                                            <div class="instructor-info text-center">
                                                <h5 class="font-title--sm">{{ $user->name }}</h5>
                                                <p class="text-secondary mb-3">
                                                    @if ($user->designation == null)
                                                        Instructor
                                                    @else
                                                        {{ $user->designation }}
                                                    @endif
                                                </p>
                                                <div class="">
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <i id="instructorsocialpen" class="ti-pencil"></i>
                                                    </div>
                                                    <div id="instructorsocial">
                                                        <ul class="list-inline social-links">
                                                            @if ($user->facebook != null)
                                                                <li class="list-inline-item">
                                                                    <a href="{{ $user->facebook }}">
                                                                        <svg width="9" height="18" viewbox="0 0 9 18"
                                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M7.3575 2.98875H9.00075V0.12675C8.71725 0.08775 7.74225 0 6.60675 0C4.2375 0 2.6145 1.49025 2.6145 4.22925V6.75H0V9.9495H2.6145V18H5.82V9.95025H8.32875L8.727 6.75075H5.81925V4.5465C5.82 3.62175 6.069 2.98875 7.3575 2.98875Z"
                                                                                fill="#42414B"></path>
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if ($user->linkedin != null)
                                                                <li class="list-inline-item">
                                                                    <a href="{{ $user->linkedin }}">
                                                                        <svg width="18" height="18"
                                                                            viewbox="0 0 18 18" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M17.9955 18.0002V17.9994H18V11.3979C18 8.16841 17.3047 5.68066 13.5292 5.68066C11.7142 5.68066 10.4962 6.67666 9.99896 7.62091H9.94646V5.98216H6.3667V17.9994H10.0942V12.0489C10.0942 10.4822 10.3912 8.96716 12.3315 8.96716C14.2432 8.96716 14.2717 10.7552 14.2717 12.1494V18.0002H17.9955Z"
                                                                                fill="#42414B"></path>
                                                                            <path
                                                                                d="M0.296875 5.98291H4.02888V18.0002H0.296875V5.98291Z"
                                                                                fill="#42414B"></path>
                                                                            <path
                                                                                d="M2.1615 0C0.96825 0 0 0.96825 0 2.1615C0 3.35475 0.96825 4.34325 2.1615 4.34325C3.35475 4.34325 4.323 3.35475 4.323 2.1615C4.32225 0.96825 3.354 0 2.1615 0V0Z"
                                                                                fill="#42414B"></path>
                                                                        </svg>

                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div id="instructorsocialform" class="d-none">
                                                        <form id="" method="post"
                                                            action="{{ route('users.update', $user->id) }}">
                                                            @method('patch')
                                                            @csrf
                                                            <ul class="list-inline social-links">
                                                                <li class="list-inline-item">
                                                                    <svg width="18" height="18" viewbox="0 0 18 18"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M17.9955 18.0002V17.9994H18V11.3979C18 8.16841 17.3047 5.68066 13.5292 5.68066C11.7142 5.68066 10.4962 6.67666 9.99896 7.62091H9.94646V5.98216H6.3667V17.9994H10.0942V12.0489C10.0942 10.4822 10.3912 8.96716 12.3315 8.96716C14.2432 8.96716 14.2717 10.7552 14.2717 12.1494V18.0002H17.9955Z"
                                                                            fill="#42414B"></path>
                                                                        <path
                                                                            d="M0.296875 5.98291H4.02888V18.0002H0.296875V5.98291Z"
                                                                            fill="#42414B"></path>
                                                                        <path
                                                                            d="M2.1615 0C0.96825 0 0 0.96825 0 2.1615C0 3.35475 0.96825 4.34325 2.1615 4.34325C3.35475 4.34325 4.323 3.35475 4.323 2.1615C4.32225 0.96825 3.354 0 2.1615 0V0Z"
                                                                            fill="#42414B"></path>
                                                                    </svg>
                                                                    <input type="text" name="facebook" id=""
                                                                        class="form-control mt-1">
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <svg width="9" height="18" viewbox="0 0 9 18"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M7.3575 2.98875H9.00075V0.12675C8.71725 0.08775 7.74225 0 6.60675 0C4.2375 0 2.6145 1.49025 2.6145 4.22925V6.75H0V9.9495H2.6145V18H5.82V9.95025H8.32875L8.727 6.75075H5.81925V4.5465C5.82 3.62175 6.069 2.98875 7.3575 2.98875Z"
                                                                            fill="#42414B"></path>
                                                                    </svg>
                                                                    <input type="text" name="linkedin" id=""
                                                                        class="form-control mt-1">

                                                                </li>
                                                            </ul>
                                                            <input type="submit" value="Save"
                                                                class="btn btn-primary btn-sm">
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-none instructor-course-info">
                                                <div class="instructor-course-info-rating">
                                                    <div class="icon d-flex align-items-center justify-content-center">
                                                        <svg width="30" height="28" viewbox="0 0 30 28"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15.9846 2.35002L19.1839 8.69148C19.3441 9.01135 19.6535 9.23457 20.0127 9.28629L27.1751 10.3058C27.4652 10.3439 27.7263 10.4936 27.9045 10.7223C28.2388 11.151 28.1877 11.7581 27.7871 12.1269L22.5959 17.0733C22.332 17.3183 22.2146 17.6776 22.2837 18.0274L23.5269 25.0072C23.6139 25.5857 23.2133 26.1274 22.6263 26.2213C22.3831 26.2581 22.1345 26.22 21.9135 26.1125L15.5343 22.8172C15.2138 22.6457 14.8298 22.6457 14.5093 22.8172L8.0831 26.1302C7.54574 26.3997 6.8882 26.1996 6.59535 25.681C6.48346 25.4714 6.44478 25.2332 6.48346 25.0004L7.7267 18.0206C7.78886 17.6722 7.67145 17.3142 7.41451 17.0678L2.19566 12.1229C1.77019 11.7064 1.76743 11.0285 2.19151 10.6093C2.1929 10.6079 2.19428 10.6052 2.19566 10.6039C2.37109 10.4473 2.58659 10.3425 2.82004 10.3017L9.98387 9.28221C10.3417 9.2264 10.6497 9.0059 10.8127 8.68604L14.0092 2.35002C14.1377 2.09277 14.3656 1.89541 14.6419 1.80557C14.9195 1.71438 15.2234 1.73616 15.4845 1.86546C15.6986 1.97027 15.8741 2.14041 15.9846 2.35002Z"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="text text-center">
                                                        <h6>5.0</h6>
                                                        <p>Ratings</p>
                                                    </div>
                                                </div>
                                                <div class="instructor-course-info-students">
                                                    <div class="icon d-flex align-items-center justify-content-center">
                                                        <svg width="36" height="28" viewbox="0 0 36 28"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M26.9229 12.4414C29.4522 12.4414 31.504 10.3823 31.504 7.84211C31.504 5.30195 29.4522 3.2428 26.9229 3.2428"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M29.0283 17.4402C29.7836 17.4925 30.5346 17.6 31.274 17.7672C32.3014 17.9691 33.5371 18.392 33.977 19.3177C34.2577 19.9106 34.2577 20.6008 33.977 21.1952C33.5386 22.1209 32.3014 22.5423 31.274 22.7545"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M9.07725 12.4414C6.54792 12.4414 4.49609 10.3823 4.49609 7.84211C4.49609 5.30195 6.54792 3.2428 9.07725 3.2428"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M6.97137 17.4403C6.21604 17.4926 5.46505 17.6002 4.72564 17.7673C3.69828 17.9693 2.46256 18.3921 2.02412 19.3178C1.74196 19.9107 1.74196 20.601 2.02412 21.1953C2.46111 22.121 3.69828 22.5424 4.72564 22.7546"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M17.9921 18.4314C23.1173 18.4314 27.4959 19.2103 27.4959 22.3274C27.4959 25.443 23.1462 26.2509 17.9921 26.2509C12.8654 26.2509 8.48828 25.472 8.48828 22.355C8.48828 19.2379 12.8379 18.4314 17.9921 18.4314Z"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M17.9927 13.9843C14.6125 13.9843 11.9023 11.2625 11.9023 7.86643C11.9023 4.4718 14.6125 1.75 17.9927 1.75C21.3729 1.75 24.0831 4.4718 24.0831 7.86643C24.0831 11.2625 21.3729 13.9843 17.9927 13.9843Z"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="text text-center">
                                                        <h6>29,874</h6>
                                                        <p>Students Learning</p>
                                                    </div>
                                                </div>
                                                <div class="instructor-course-info-courses">
                                                    <div class="icon d-flex align-items-center justify-content-center">
                                                        <svg width="32" height="28" viewbox="0 0 32 28"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2 1.75H10.4C11.8852 1.75 13.3096 2.32361 14.3598 3.34464C15.41 4.36567 16 5.75049 16 7.19444V26.25C16 25.167 15.5575 24.1284 14.7699 23.3626C13.9822 22.5969 12.9139 22.1667 11.8 22.1667H2V1.75Z"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M30 1.75H21.6C20.1148 1.75 18.6904 2.32361 17.6402 3.34464C16.59 4.36567 16 5.75049 16 7.19444V26.25C16 25.167 16.4425 24.1284 17.2302 23.3626C18.0178 22.5969 19.0861 22.1667 20.2 22.1667H30V1.75Z"
                                                                stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="text text-center">
                                                        <h6>35</h6>
                                                        <p>Courses</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="about-instructor">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="font-title--card">About Me</h6>
                                                </div>
                                                <div class="">
                                                    @if ($user->about_me == null)
                                                        <p class="font-para--md">
                                                            Please say something about you.
                                                        </p>
                                                    @else
                                                        {!! $user->about_me !!}
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- ---------------------------------------------------------------------------- --}}
                                            <div class="d-none instructor-qualification">
                                                <h6>Education</h6>
                                                <div class="qualification-info">
                                                    <div class="qualification-info-title">
                                                        <h6>Bachelor Degree</h6>
                                                        <p>2008 - 2010</p>
                                                    </div>
                                                    <p>
                                                        Don Honorio Vectura Technological States University
                                                    </p>
                                                </div>
                                                <div class="qualification-info">
                                                    <div class="qualification-info-title">
                                                        <h6>Vocation</h6>
                                                        <p>2018 - 2011</p>
                                                    </div>
                                                    <p>
                                                        Gonzalo Puyat School of Arts and Trades
                                                    </p>
                                                </div>
                                                <div class="qualification-info pb-0 mb-0 border-0">
                                                    <div class="qualification-info-title">
                                                        <h6>Bachelor of Design</h6>
                                                        <p>2012 - 2014</p>
                                                    </div>
                                                    <p>
                                                        Don Honorio Vectura Technological States University
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- --------------------------------------------------------------------------- --}}
                                            <div class="d-none instructor-qualification mb-0 pb-0 border-0">
                                                <h6>Experiences</h6>
                                                <div class="qualification-info">
                                                    <div class="qualification-info-title">
                                                        <h6>Typeface Design</h6>
                                                        <p>2008 - 2010</p>
                                                    </div>
                                                    <p>
                                                        Integer ultricies a turpis ac mattis. Integer auctor eleifend diam vitae
                                                        sodales. Nullam mollis semper rutrum. Vestibulum hendrerit nulla vitae
                                                        velit semper.
                                                    </p>
                                                </div>
                                                <div class="qualification-info pb-0 mb-0 border-0">
                                                    <div class="qualification-info-title">
                                                        <h6>Graphic Design</h6>
                                                        <p>2018 - 2011</p>
                                                    </div>
                                                    <p>
                                                        Integer ultricies a turpis ac mattis. Integer auctor eleifend diam vitae
                                                        sodales. Nullam mollis semper rutrum. Vestibulum hendrerit nulla vitae
                                                        velit semper.
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- --------------------------------------------------------------------------------- --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mt-4 mt-lg-0">
                                        <div class="instructor-tabs">
                                            <ul class="nav nav-pills instructor-tabs-pills mb-3" id="pills-tab"
                                                role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-courses-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-courses" type="button"
                                                        role="tab" aria-selected="true">Courses</button>
                                                </li>
                                                <li class="nav-item d-none" role="presentation">
                                                    <button class="nav-link me-0" id="pills-pills-review-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-pills-review"
                                                        type="button" role="tab" aria-selected="false">Review</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-courses" role="tabpanel"
                                                    aria-labelledby="pills-courses-tab">
                                                    <div class="row">
                                                        @forelse ($user->instructedCourses as $course)
                                                            <div class="col-md-6 mb-4">
                                                                @include('frontend.inc.course_showcase')
                                                            </div>
                                                        @empty
                                                            <p class="text-secondary mb-3">
                                                                No Course Instructed Yet.
                                                            </p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="d-none tab-pane fade" id="pills-pills-review" role="tabpanel"
                                                    aria-labelledby="pills-pills-review-tab">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="instructor-rating-area d-flex">
                                                                <div class="rating-number">
                                                                    <h2>4.6</h2>
                                                                    <div class="rating-icon">
                                                                        <ul class="list-inline">
                                                                            <li class="list-inline-item">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewbox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <polygon
                                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                    </polygon>
                                                                                </svg>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewbox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <polygon
                                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                    </polygon>
                                                                                </svg>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewbox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <polygon
                                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                    </polygon>
                                                                                </svg>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewbox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <polygon
                                                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                    </polygon>
                                                                                </svg>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-star-half"
                                                                                    viewbox="0 0 16 16">
                                                                                    <path
                                                                                        d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z">
                                                                                    </path>
                                                                                </svg>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>Instructor Rating</p>
                                                                </div>
                                                                <div class="ms-lg-4 rating-range">
                                                                    <div class="rating-range-item d-flex align-items-center">
                                                                        <div class="rating-range-item-ratings">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="rating-range-item-bar">
                                                                            <div class="rating-width" style="width: 23%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating-range-item-percent">
                                                                            <p>59%</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="rating-range-item d-flex align-items-center four-star">
                                                                        <div class="rating-range-item-ratings">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="rating-range-item-bar">
                                                                            <div class="rating-width" style="width: 60%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating-range-item-percent">
                                                                            <p>31%</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="rating-range-item d-flex align-items-center three-star">
                                                                        <div class="rating-range-item-ratings">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="rating-range-item-bar">
                                                                            <div class="rating-width" style="width: 50%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating-range-item-percent">
                                                                            <p>1%</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="rating-range-item d-flex align-items-center two-star">
                                                                        <div class="rating-range-item-ratings">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="rating-range-item-bar">
                                                                            <div class="rating-width" style="width: 95%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating-range-item-percent">
                                                                            <p>1%</p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="rating-range-item d-flex align-items-center one-star">
                                                                        <div class="rating-range-item-ratings">
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                                <li class="list-inline-item">
                                                                                    <svg class="fill-star feather feather-star"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewbox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                        <polygon
                                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                                        </polygon>
                                                                                    </svg>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="rating-range-item-bar">
                                                                            <div class="rating-width" style="width: 39%;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="rating-range-item-percent">
                                                                            <p>1%</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="students-feedback">
                                                                <div class="students-feedback-heading">
                                                                    <h5>Students Feedback <span>(57,685)</span></h5>
                                                                    <div class="right">
                                                                        <h6>Sort by:</h6>
                                                                        <div class="dropdown">
                                                                            <button class="btn dropdown-toggle"
                                                                                type="button" id="dropdownMenu2"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                All Rating
                                                                            </button>
                                                                            <ul class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenu2">
                                                                                <li><button class="dropdown-item"
                                                                                        type="button">Rating</button></li>
                                                                                <li><button class="dropdown-item"
                                                                                        type="button">Another Rating</button>
                                                                                </li>
                                                                                <li><button class="dropdown-item"
                                                                                        type="button">Rating else
                                                                                        here</button></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="students-feedback-item">
                                                                    <div class="feedback-rating">
                                                                        <div class="feedback-rating-start">
                                                                            <div class="image">
                                                                                <img src="{{ asset('images/frontimages/ellipse/user.jpg') }}"
                                                                                    alt="Image">
                                                                            </div>
                                                                            <div class="text">
                                                                                <h6><a href="#">Harry Pinsky</a></h6>
                                                                                <p>1 hour ago</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="feedback-rating-end">
                                                                            <div class="rating-icons rating-icons-2"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        Aliquam eget leo quis neque molestie dictum. Etiam ut
                                                                        tortor tempor, vestibulum ante non, vulputate nibh. Cras
                                                                        non molestie diam. Great Course for Beginner 😀
                                                                    </p>
                                                                </div>
                                                                <div class="students-feedback-item">
                                                                    <div class="feedback-rating">
                                                                        <div class="feedback-rating-start">
                                                                            <div class="image">
                                                                                <img src="{{ asset('images/frontimages/ellipse/1.png') }}"
                                                                                    alt="Image">
                                                                            </div>
                                                                            <div class="text">
                                                                                <h6><a href="#">Harry Pinsky</a></h6>
                                                                                <p>2 hour ago</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="feedback-rating-end">
                                                                            <div class="rating-icons rating-icons-2"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        Aliquam eget leo quis neque molestie dictum. Etiam ut
                                                                        tortor tempor, vestibulum ante non, vulputate nibh.
                                                                    </p>
                                                                </div>
                                                                <div class="students-feedback-item">
                                                                    <div class="feedback-rating">
                                                                        <div class="feedback-rating-start">
                                                                            <div class="image">
                                                                                <img src="{{ asset('images/frontimages/ellipse/2.png') }}"
                                                                                    alt="Image">
                                                                            </div>
                                                                            <div class="text">
                                                                                <h6><a href="#">Watcraz Eggsy</a></h6>
                                                                                <p>1 day ago</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="feedback-rating-end">
                                                                            <div class="rating-icons rating-icons-2"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        Aenean vulputate nisi ligula. Quisque in tempus sapien.
                                                                        Quisque vestibulum massa eget consequat scelerisque.
                                                                        Phasellus varius risus nec maximus auctor.
                                                                    </p>
                                                                </div>
                                                                <div class="students-feedback-item border-0">
                                                                    <div class="feedback-rating">
                                                                        <div class="feedback-rating-start">
                                                                            <div class="image">
                                                                                <img src="{{ asset('images/frontimages/ellipse/3.png') }}"
                                                                                    alt="Image">
                                                                            </div>
                                                                            <div class="text">
                                                                                <h6><a href="#">Watcraz Eggsy</a></h6>
                                                                                <p>1 day ago</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="feedback-rating-end">
                                                                            <div class="rating-icons rating-icons-2"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        Cras non molestie diam. Aenean vulputate nisi ligula.
                                                                        Quisque in tempus sapien. Quisque vestibulum massa eget
                                                                        consequat scelerisque.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button
                                                                        class="button button-md button--primary-outline">Load
                                                                        more</button>
                                                                </div>
                                                            </div>
                                                            <div class="feedback-comment">
                                                                <h6 class="font-title--card">Leave a Rating</h6>
                                                                <span>Rating</span>
                                                                <!-- <div id="my-rating"></div> -->
                                                                <div class="my-rating rating-icons rating-icons-modal"></div>
                                                                <form action="#">
                                                                    <label for="comment">Message</label>
                                                                    <textarea class="form-control" id="comment" placeholder="how is your feeling about the instructor"></textarea>
                                                                    <button type="submit"
                                                                        class="button button-lg button--primary float-end">Post
                                                                        Review</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                </div>
            </div>
        </div>
    </section>




@endsection


@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#about_me'))
            .catch(error => {
                console.error(error);
            });
        $(document).ready(function() {

            $("#studentaboutpen").click(function() {
                $("#studentaboutform").toggleClass("d-none");
                $("#studentabout").toggleClass("d-none");
            });

            $("#studentnamepen").click(function() {
                $("#studentnameform").toggleClass("d-none");
                $("#studentname").toggleClass("d-none");
            });

            $("#instructoraboutpen").click(function() {
                $("#instructoraboutform").toggleClass("d-none");
                $("#instructorabout").toggleClass("d-none");
            });
            $("#studentinfopen").click(function() {
                $("#studentinfoform").toggleClass("d-none");
                $("#studentinfo").toggleClass("d-none");
            });
            $("#instructorsocialpen").click(function() {
                $("#instructorsocialform").toggleClass("d-none");
                $("#instructorsocial").toggleClass("d-none");
            });


            $("#selectedFile").on('input', function() {
                $("#submitPP").click();
            });

        });
    </script>
@endsection

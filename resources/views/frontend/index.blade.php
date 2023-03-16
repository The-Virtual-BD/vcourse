@extends('frontend.layouts.app')

@section('content')



    <!-- Banner Starts Here -->
    <section class="main-banner" style="background-image: url({{asset('images/frontimages/banner/banner.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-lg-0 order-2 order-lg-0">
                    <div class="banner-two-start">
                        <h1 class="font-title--lg">Develop Skills With Expert on Live!</h1>
                        <p>
                            Our goal is to construct skills and transform Bangladesh's unemployment crisis into competent manpower for the digital economy.
                        </p>
                        <form action="{{route('courses.search')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="banner-input">
                                <div class="main-input">
                                    <input type="text" placeholder="what do you want do learn today..." name="search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </div>
                                <div class="search-button">
                                    <button type="submit" class="button button-lg button--primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-0">
                    <div class="main-banner-end">
                        <img src="{{asset('images/frontimages/banner/mujib.png')}}" alt="image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse Categories Starts Here -->
    <section class="section browse-categories">
        <div class="container">
            <h2 class="font-title--md text-center mb-0">Browse Course with Top Categories</h2>
            <div class="browse-categories__wrapper position-relative">
                <div class="row gx-3 categories--box">
                    <div class="col-sm-12 col-md-3">
                        <div class=" browse-categories-item default-item-two">
                            <div class="browse-categories-item-icon">
                                <div class="categories-two default-categories">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor">
                                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                        <line x1="8" y1="21" x2="16" y2="21"></line>
                                        <line x1="12" y1="17" x2="12" y2="21"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="browse-categories-item-text">
                                <h6 class="font-title--card"><a href="{{route('home.category',5)}}">Development</a></h6>
                                <p>@php
                                    $musiCourses = App\Models\Course::where('category_id', 5)->count();
                                    print($musiCourses );
                                @endphp Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class=" browse-categories-item default-item-three">
                            <div class="browse-categories-item-icon">
                                <div class="categories-three default-categories">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool">
                                        <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                                        <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                                        <path d="M2 2l7.586 7.586"></path>
                                        <circle cx="11" cy="11" r="2"></circle>
                                    </svg>
                                </div>
                            </div>
                            <div class="browse-categories-item-text">
                                <h6 class="font-title--card"><a href="{{route('home.category',2)}}">Design</a></h6>
                                <p>@php
                                    $musiCourses = App\Models\Course::where('category_id', 2)->count();
                                    print($musiCourses );
                                @endphp Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class=" browse-categories-item default-item-four">
                            <div class="browse-categories-item-icon">
                                <div class="categories-four default-categories">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones">
                                        <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                                        <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="browse-categories-item-text">
                                <h6 class="font-title--card"><a href="{{route('home.category',7)}}">Music</a></h6>
                                <p>@php
                                    $musiCourses = App\Models\Course::where('category_id', 7)->count();
                                    print($musiCourses );
                                @endphp Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class=" browse-categories-item default-item-five">
                            <div class="browse-categories-item-icon">
                                <div class="categories-five default-categories">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="browse-categories-item-text">
                                <h6 class="font-title--card"><a href="{{route('home.category',6)}}">Marketing</a></h6>
                                <p>@php
                                    $musiCourses = App\Models\Course::where('category_id', 6)->count();
                                    print($musiCourses );
                                @endphp Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{route('courses.index')}}" class="button button-lg button--primary mt-lg-3 mt-5">Browse all Courses</a>
                </div>
            </div>
        </div>
        <div class="browse-categories-shape">
            <img src="{{asset('images/frontimages/shape/dots/dots-img-11.png')}}" alt="shape" class="img-fluid shape-01">
            <img src="{{asset('images/frontimages/shape/line01.png')}}" alt="shape" class="img-fluid shape-02">
        </div>
    </section>

    <!--  Popular Courses Starts Here -->
    <section class="pt-4 section--bg-offwhite-three featured-popular-courses main-popular-course">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-heading text-center mt-4 mb-3">
                        <h3 class="font-title--md">Our Popular Courses</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="featured-popular-courses-heading d-flex align-content-center justify-content-between">
                        <div class="nav-button featured-popular-courses-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link px-2" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="false">
                                        All
                                    </button>
                                </li>
                                @foreach ($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link px-2" id="pills-{{$category->id}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$category->id}}" type="button" role="tab" aria-controls="pills-{{$category->id}}" aria-selected="false">
                                        {{$category->name}}
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="row">
                            @foreach ($courses->take(6) as $course)
                            <div class="col-xl-4 col-md-6 mb-4">
                                @include('frontend.inc.course_showcase')
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @foreach ($categories as $category)

                    <div class="tab-pane fade" id="pills-{{$category->id}}" role="tabpanel" aria-labelledby="pills-{{$category->id}}-tab">
                        <?php $coursecats = $courses->where('category_id',$category->id); ?>
                        <div class="row">
                            @if ($coursecats->count())
                            @foreach ($coursecats->take(3) as $course)
                            <div class="col-xl-4 col-md-6 mb-4">
                                @include('frontend.inc.course_showcase')
                            </div>
                            @endforeach

                            @else
                            <div class="col-12 d-flex justify-content-center">
                                <img src="{{asset('images/noCourseFound.png')}}" alt="" srcset="">
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach





                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('courses.index')}}" class="button button-lg button--primary mt-lg-5 mt-2">Browse all Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-popular-courses-shape">
            <img src="{{asset('images/frontimages/shape/dots/dots-img-12.png')}}" alt="Shape" class="img-fluid dot-06">
            <img src="{{asset('images/frontimages/shape/triangel.png')}}" alt="Shape" class="img-fluid dot-07">
        </div>
    </section>
    {{-- why you learn with vcourse --}}
    <section class="section feature section section--bg-offwhite-one">
        <div class="container">
            <h2 class="font-title--md text-center">Why You'll Learn with Vcourse</h2>
            <div class="row overflow-hidden">
                <div class="col-lg-4 col-md-6" style="margin-bottom: -99999px;padding-bottom: 99999px;">
                    <div class="cardFeature h-100">
                        <div class="cardFeature__icon cardFeature__icon--bg-g">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Live Class </h5>
                        <p>
                            VCourse is here to give you with the finest live class available, as we wish to answer any questions that arise during the lesson. Our live session begins with a pre-recorded demo class that is completely free. A live class is a fantastic way to learn quickly, and it's even more vital to eliminate any remaining doubts regarding the lesson you're receiving.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="margin-bottom: -99999px;padding-bottom: 99999px;">
                    <div class="cardFeature h-100">
                        <div class="cardFeature__icon cardFeature__icon--bg-b">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Lifetime Access , Support and Guidelines</h5>
                        <p>
                            When a new individual wants to learn, it is critical that they have someone to help them. Don't be concerned because we have a live and simple solution with Instructor for your difficulty. Vcourse is always available for support 24 hours a day, seven days a week to resolve any arasing concerns.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" style="margin-bottom: -99999px;padding-bottom: 99999px;">
                    <div class="cardFeature h-100">
                        <div class="cardFeature__icon cardFeature__icon--bg-r">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <h5 class="font-title--xs">Easy and User Friendly</h5>
                        <p>
                            The learning approach must be simple for learners so that they may simply determine what their next steps are. Vcourse strive to make our lessons simpler, more user-friendly, and packed with essential information delivered by skilled educators.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  Learning Rules Starts Here -->
    <section class="section learning-rules">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-0">
                    <div class="learning-rules-starts">
                        <h2 class="font-title--md">
                            Vcourse Creative<br class="d-none d-md-block">
                            Learning Steps
                        </h2>
                        <div class="learning-rules__wrapper">
                            <div class="learning-rules-item">
                                <div class="item-number"><span>01.</span></div>
                                <div class="item-text">
                                    <h6>Find What Suits You Most.</h6>
                                    <p>
                                        Learn what make sense to you and find best course from Vcourse. Learn which grab your attention mostly and you're highly interested.
                                    </p>
                                </div>
                            </div>
                            <div class="learning-rules-item">
                                <div class="item-number"><span>02.</span></div>
                                <div class="item-text">
                                    <h6>Get ready and Make Your Own Place.</h6>
                                    <p>
                                        Be prepared about your class and ask questions to instructor if you don't understand his/her lessons. Attend every quiz, classes and try to improve.
                                    </p>
                                </div>
                            </div>
                            <div class="learning-rules-item">
                                <div class="item-number"><span>03.</span></div>
                                <div class="item-text">
                                    <h6>Practice and Become Expert on Your Field.</h6>
                                    <p>
                                        Practice more and more to become expert on your field. Without practicing no one can be successful. Mind one thing that everyone values on your expertises not on your outward!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 start-learning">
                                <a href="{{route('courses.index')}}" class="button button-lg button--primary">Start Learning</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-0">
                    <div class="learning-rules-ends">
                        <img src="{{asset('images/frontimages/hero/hero-img-01.jpg')}}" alt="img" class="img-fluid">
                        <div class="learning-rules-ends-circle">
                            <img src="{{asset('images/frontimages/shape/l03.png')}}" alt="shape" class="img-fluid">
                        </div>
                        <div class="earning-rules-ends-shape">
                            <img src="{{asset('images/frontimages/shape/l04.png')}}" alt="shape" class="img-fluid shape-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="learning-rules-shape">
            <img src="{{asset('images/frontimages/shape/dots/dots-img-16.png')}}" alt="shape" class="img-fluid shape-01">
            <img src="{{asset('images/frontimages/shape/l02.png')}}" alt="shape" class="img-fluid shape-02">
        </div>
    </section>



    <!--  About Services Starts Here -->
    <section class=" about-services py-5 section--bg-offgradient">
        <div class="container my-md-5">
            <div class="row">
                <div class="col-lg-6 text-center mx-auto">
                    <h2 class="font-title--md">What Our Students Says About our Services</h2>
                </div>
            </div>
            <div class="row testimonial d-flex">
                @foreach ($testimonials as $testimonial)
                <div class="col-md-4 col-sm-12 position-relative px-3  overflow-didden mb-3">
                    <div class="p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
                        <p>
                            “{!!$testimonial->rev_text!!}“
                        </p>
                        <div class="testimonial__user-wrapper d-flex justify-content-between">
                            <div class="testimonial__user d-flex align-items-center">
                                <div class="testimonial__user-img">
                                    <img src="{{asset($testimonial->rev_photo)}}" alt="Client">
                                </div>
                                <div class="testimonial__user-info">
                                    <h6>{{$testimonial->name}}</h6>
                                    <span class="font-para--md">{{$testimonial->designation}}</span>
                                </div>
                            </div>
                            <ul class="testimonial__item-star d-flex align-items-center">
                                @for ($i = 0; $i < $testimonial->rev_number; $i++)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="about-services-shape">
            <img src="{{asset('images/frontimages/shape/line02.png')}}" alt="shape" class="img-fluid img-shape-01">
            <img src="{{asset('images/frontimages/shape/dots/dots-img-13.png')}}" alt="shape" class="img-fluid img-shape-02">
            <img src="{{asset('images/frontimages/shape/l02.png')}}" alt="shape" class="img-fluid img-shape-03">
        </div>
    </section>

    <!-- Best Instructors Starts Here -->
    <section class="section best-instructor-featured overflow-hidden main-instructor-featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <h3 class="text-center mb-40 font-title--md">Meet Our Instructor</h3>
                    <div class="ourinstructor__wrapper mt-lg-5 mt-0">
                        <div class="ourinstructor-active">
                            {{-- col-md-2 col-sm-12 --}}
                            <div class="row owl-carousel">
                                @forelse ($teammembers as $teammember)
                                <div class="col">
                                    <div class="mentor">
                                        <div class="mentor__img">
                                            <img src="{{asset($teammember->photo)}}" alt="Mentor image">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="{{$teammember->linkedin}}" tabindex="0" target="_blank">
                                                        <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.9955 18.0002V17.9994H18V11.3979C18 8.16841 17.3047 5.68066 13.5292 5.68066C11.7142 5.68066 10.4962 6.67666 9.99896 7.62091H9.94646V5.98216H6.3667V17.9994H10.0942V12.0489C10.0942 10.4822 10.3912 8.96716 12.3315 8.96716C14.2432 8.96716 14.2717 10.7552 14.2717 12.1494V18.0002H17.9955Z" fill="#25252E"></path>
                                                            <path d="M0.296997 5.98242H4.029V17.9997H0.296997V5.98242Z" fill="#25252E"></path>
                                                            <path d="M2.1615 0C0.96825 0 0 0.96825 0 2.1615C0 3.35475 0.96825 4.34325 2.1615 4.34325C3.35475 4.34325 4.323 3.35475 4.323 2.1615C4.32225 0.96825 3.354 0 2.1615 0V0Z" fill="#25252E"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{$teammember->facebook}}" tabindex="0" target="_blank">
                                                        <svg width="9" height="18" viewbox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.3575 2.98875H9.00075V0.12675C8.71725 0.08775 7.74225 0 6.60675 0C4.2375 0 2.6145 1.49025 2.6145 4.22925V6.75H0V9.9495H2.6145V18H5.82V9.95025H8.32875L8.727 6.75075H5.81925V4.5465C5.82 3.62175 6.069 2.98875 7.3575 2.98875Z" fill="#25252E"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mentor__title">
                                            <h6>
                                                <a href="#" tabindex="0">{{$teammember->name}}</a>
                                            </h6>
                                            <p>{{$teammember->designation}}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col">
                                    <h2>No Team Member</h2>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-instructor-featured-shape">
            <img src="{{asset('images/frontimages/shape/dots/dots-img-14.png')}}" alt="shape" class="img-fluid shape01">
            <img src="{{asset('images/frontimages/shape/triangel2.png')}}" alt="shape" class="img-fluid shape02">
        </div>
    </section>

    <!--  Main Become Instructor Starts Here -->
    <section class="section main-become-instructor">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="main-become-instructor-item me-12">
                        <div class="main-image">
                            <img src="{{asset('images/frontimages/event/image01.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div class="main-text">
                            <h6 class="font-title--sm">Become an Instructor</h6>
                            <p class="d-none">
                                Praesent ultricies nulla ac congue bibendum. Aliquam tempor euismod purus posuere gravida. Praesent augue sapien, vulputate eu imperdiet eget, tempor at enim.
                            </p>
                            <div class="text-center">
                                <a href="{{route('home.becomeInstructor')}}" class="green-btn">Apply as Instructor</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none">
                    <div class="main-become-instructor-item ms-12 mb-0">
                        <div class="main-image">
                            <img src="{{asset('images/frontimages/event/image02.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div class="main-text">
                            <h6 class="font-title--sm">Use Eduguard For Business</h6>
                            <p>
                                Praesent ultricies nulla ac congue bibendum. Aliquam tempor euismod purus posuere gravida. Praesent augue sapien, vulputate eu imperdiet eget, tempor at enim.
                            </p>
                            <div class="text-center">
                                <a href="#" class="green-btn">Get Eduguard For Business</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-become-instructor-shape">
            <img src="{{asset('images/frontimages/shape/line03.png')}}" alt="shape" class="img-fluid">
        </div>
    </section>

    <!-- News Letter Starts Here -->
    <section style="background-color: #ebebf2;" class="pb-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="newsletter-area text-center">
                        <h4>Subscribe our Newsletter</h4>
                        <span id="subMsg" class="m-4"></span>
                        <form id="subForm">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control border-lowBlack" placeholder="Your email" required>
                                <button  class="button button-lg button--primary" id="subscribe">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection


@section("script")
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items:4,
            autoplay:true,
            autoplayTimeout:2000,
            loop:true,
            autoplayHoverPause:true,
            margin:14,
            responsiveBaseElement:".owl-carousel",
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true,
                    loop:false
                }
            }
        });


        $("#subscribe").click(function(event){
            event.preventDefault();

            let email = $("input[name=email]").val();
            let _token = $('input[name="_token"]').val();

            $.ajax({
            url: "/subscriptions/store",
            type:"POST",
            data:{
                email:email,
                _token: _token
            },
            beforeSend: function() {
            $("#subscribe").prop('disabled', true); // disable button
            },
            success:function(response){
                $('#subMsg').text(response.success);
                $('#subMsg').toggleClass('text-success');
                $("#subscribe").css("display", "none");
                $("#subForm")[0].reset();
            },
            error: function(error) {
                $('#subMsg').text(error.responseJSON.errors.email);
                $('#subMsg').toggleClass('text-danger');
                $("#subForm")[0].reset();
                $("#subscribe").prop('disabled', false); // disable button
                $("#subscribe").css("display", "block");


            }
            });
        });
    });
  </script>
@endsection

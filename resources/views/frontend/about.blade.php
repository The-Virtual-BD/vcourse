@extends('frontend.layouts.app')

@section('content')

        <!-- About Intro Starts Here -->
        <section class="about-intro section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 position-relative mt-4 mt-lg-0" style="z-index: 0;">
                        <div class="about-intro__img-wrapper">
                            <img src="{{asset('images/frontimages/about/intro.png')}}" alt="Intro Image" class="img-fluid rounded-2 ms-lg-5 position-relative intro-image">
                        </div>
                        <div class="intro-shape">
                            <img src="{{asset('images/frontimages/shape/rec04.png')}}" alt="Shape" class="img-fluid shape-01">
                            <img src="{{asset('images/frontimages/shape/dots/dots-img-09.png')}}" alt="Shape" class="img-fluid shape-02">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-intro__textContent">
                            <h2 class="font-title--md mb-3">A Great Place to Grow.</h2>
                            <p class="mt-2 mt-lg-1 mb-2 mb-lg-4 text-secondary">
                                Vcourse is a place where you can grow! Contribute to your own growth by coming to us. Our instructors are constantly available to you and will teach you in a unique and effective manner. The Vcourse team will ensure that you grow to your full potential in your course!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Intro Ends Here -->

        <!-- About Feature Starts Here -->
        <section class="section aboutFeature pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-feature border-primary">
                            <h5 class="font-title--sm">Who We Are</h5>
                            <p class="text-lowblack">
                                We are a creative team. We're here to help you discover your innate creativity through our course. Our classes will assist you in thinking differently than others. Our team is comprised of a group of innovative educators who are prepared to address your difficulties at your level of comprehension. We're here to infuse your thoughts with our creativity. Learning with us will be an unforgettable experience that you will remember forever.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="about-feature border-primary">
                            <h5 class="font-title--sm">Our Mission</h5>
                            <p class="text-secondary">
                                You are aware of our motto? That is our motto, "Learn for Being Creative". We are interested in discovering each individual's creativity. We believe that a teacher may enrich his or her pupils' inventions, and so all of our instructors are dedicated to eliciting the highest performance from their students. Even if you are completely ignorant, there is always something new to learn. Our goal is to fulfill your desire to learn something new and innovative.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Feature Ends Here -->



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

@endsection



@section('script')
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
    });
</script>
@endsection




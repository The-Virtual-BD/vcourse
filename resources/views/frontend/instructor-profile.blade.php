@extends('frontend.layouts.app')
@section('content')

            <!-- Instructor Courses Starts Here -->
            <section class="section instructor-courses">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="instructor-courses-instructor">
                                <div class="instructor-image mx-auto text-center">
                                    <img src="{{asset($user->profile_picture)}}" alt="Instructor">
                                </div>
                                <div class="instructor-info text-center">
                                    <h5 class="font-title--sm">{{$user->name}}</h5>
                                    <p class="text-secondary mb-3">{{$user->designation}}</p>
                                    <ul class="list-inline social-links">
                                        <li class="list-inline-item">
                                            <a href="{{$user->linkedin}}" target="_blank">
                                                <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.9955 18.0002V17.9994H18V11.3979C18 8.16841 17.3047 5.68066 13.5292 5.68066C11.7142 5.68066 10.4962 6.67666 9.99896 7.62091H9.94646V5.98216H6.3667V17.9994H10.0942V12.0489C10.0942 10.4822 10.3912 8.96716 12.3315 8.96716C14.2432 8.96716 14.2717 10.7552 14.2717 12.1494V18.0002H17.9955Z" fill="#42414B"></path>
                                                    <path d="M0.296875 5.98291H4.02888V18.0002H0.296875V5.98291Z" fill="#42414B"></path>
                                                    <path d="M2.1615 0C0.96825 0 0 0.96825 0 2.1615C0 3.35475 0.96825 4.34325 2.1615 4.34325C3.35475 4.34325 4.323 3.35475 4.323 2.1615C4.32225 0.96825 3.354 0 2.1615 0V0Z" fill="#42414B"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{$user->facebook}}" target="_blank">
                                                <svg width="9" height="18" viewbox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.3575 2.98875H9.00075V0.12675C8.71725 0.08775 7.74225 0 6.60675 0C4.2375 0 2.6145 1.49025 2.6145 4.22925V6.75H0V9.9495H2.6145V18H5.82V9.95025H8.32875L8.727 6.75075H5.81925V4.5465C5.82 3.62175 6.069 2.98875 7.3575 2.98875Z" fill="#42414B"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-none instructor-course-info">
                                    <div class="instructor-course-info-rating">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <svg width="30" height="28" viewbox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9846 2.35002L19.1839 8.69148C19.3441 9.01135 19.6535 9.23457 20.0127 9.28629L27.1751 10.3058C27.4652 10.3439 27.7263 10.4936 27.9045 10.7223C28.2388 11.151 28.1877 11.7581 27.7871 12.1269L22.5959 17.0733C22.332 17.3183 22.2146 17.6776 22.2837 18.0274L23.5269 25.0072C23.6139 25.5857 23.2133 26.1274 22.6263 26.2213C22.3831 26.2581 22.1345 26.22 21.9135 26.1125L15.5343 22.8172C15.2138 22.6457 14.8298 22.6457 14.5093 22.8172L8.0831 26.1302C7.54574 26.3997 6.8882 26.1996 6.59535 25.681C6.48346 25.4714 6.44478 25.2332 6.48346 25.0004L7.7267 18.0206C7.78886 17.6722 7.67145 17.3142 7.41451 17.0678L2.19566 12.1229C1.77019 11.7064 1.76743 11.0285 2.19151 10.6093C2.1929 10.6079 2.19428 10.6052 2.19566 10.6039C2.37109 10.4473 2.58659 10.3425 2.82004 10.3017L9.98387 9.28221C10.3417 9.2264 10.6497 9.0059 10.8127 8.68604L14.0092 2.35002C14.1377 2.09277 14.3656 1.89541 14.6419 1.80557C14.9195 1.71438 15.2234 1.73616 15.4845 1.86546C15.6986 1.97027 15.8741 2.14041 15.9846 2.35002Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div class="text text-center">
                                            <h6>5.0</h6>
                                            <p>Ratings</p>
                                        </div>
                                    </div>
                                    <div class="instructor-course-info-students">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <svg width="36" height="28" viewbox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M26.9229 12.4414C29.4522 12.4414 31.504 10.3823 31.504 7.84211C31.504 5.30195 29.4522 3.2428 26.9229 3.2428" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M29.0283 17.4402C29.7836 17.4925 30.5346 17.6 31.274 17.7672C32.3014 17.9691 33.5371 18.392 33.977 19.3177C34.2577 19.9106 34.2577 20.6008 33.977 21.1952C33.5386 22.1209 32.3014 22.5423 31.274 22.7545" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9.07725 12.4414C6.54792 12.4414 4.49609 10.3823 4.49609 7.84211C4.49609 5.30195 6.54792 3.2428 9.07725 3.2428" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M6.97137 17.4403C6.21604 17.4926 5.46505 17.6002 4.72564 17.7673C3.69828 17.9693 2.46256 18.3921 2.02412 19.3178C1.74196 19.9107 1.74196 20.601 2.02412 21.1953C2.46111 22.121 3.69828 22.5424 4.72564 22.7546" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9921 18.4314C23.1173 18.4314 27.4959 19.2103 27.4959 22.3274C27.4959 25.443 23.1462 26.2509 17.9921 26.2509C12.8654 26.2509 8.48828 25.472 8.48828 22.355C8.48828 19.2379 12.8379 18.4314 17.9921 18.4314Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9927 13.9843C14.6125 13.9843 11.9023 11.2625 11.9023 7.86643C11.9023 4.4718 14.6125 1.75 17.9927 1.75C21.3729 1.75 24.0831 4.4718 24.0831 7.86643C24.0831 11.2625 21.3729 13.9843 17.9927 13.9843Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div class="text text-center">
                                            <h6>29,874</h6>
                                            <p>Students Learning</p>
                                        </div>
                                    </div>
                                    <div class="instructor-course-info-courses">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <svg width="32" height="28" viewbox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 1.75H10.4C11.8852 1.75 13.3096 2.32361 14.3598 3.34464C15.41 4.36567 16 5.75049 16 7.19444V26.25C16 25.167 15.5575 24.1284 14.7699 23.3626C13.9822 22.5969 12.9139 22.1667 11.8 22.1667H2V1.75Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M30 1.75H21.6C20.1148 1.75 18.6904 2.32361 17.6402 3.34464C16.59 4.36567 16 5.75049 16 7.19444V26.25C16 25.167 16.4425 24.1284 17.2302 23.3626C18.0178 22.5969 19.0861 22.1667 20.2 22.1667H30V1.75Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div class="text text-center">
                                            <h6>35</h6>
                                            <p>Courses</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="about-instructor">
                                    <h6>About Me</h6>
                                    @php
                                        $userAbout = str_replace( '&', '&amp;',$user->about_me );

                                    @endphp
                                    <p>
                                        <?= $userAbout ?>
                                    </p>
                                </div>
                                <div class="instructor-qualification d-none">
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
                                <div class="instructor-qualification mb-0 pb-0 border-0 d-none">
                                    <h6>Experiences</h6>
                                    <div class="qualification-info">
                                        <div class="qualification-info-title">
                                            <h6>Typeface Design</h6>
                                            <p>2008 - 2010</p>
                                        </div>
                                        <p>
                                            Integer ultricies a turpis ac mattis. Integer auctor eleifend diam vitae sodales. Nullam mollis semper rutrum. Vestibulum hendrerit nulla vitae velit semper.
                                        </p>
                                    </div>
                                    <div class="qualification-info pb-0 mb-0 border-0">
                                        <div class="qualification-info-title">
                                            <h6>Graphic Design</h6>
                                            <p>2018 - 2011</p>
                                        </div>
                                        <p>
                                            Integer ultricies a turpis ac mattis. Integer auctor eleifend diam vitae sodales. Nullam mollis semper rutrum. Vestibulum hendrerit nulla vitae velit semper.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mt-4 mt-lg-0">
                            <div class="instructor-tabs">
                                <ul class="nav nav-pills instructor-tabs-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-courses-tab" data-bs-toggle="pill" data-bs-target="#pills-courses" type="button" role="tab" aria-selected="true">Courses</button>
                                    </li>
                                    <li class="nav-item d-none" role="presentation">
                                        <button class="nav-link me-0" id="pills-pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-pills-review" type="button" role="tab" aria-selected="false">Review</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-courses" role="tabpanel" aria-labelledby="pills-courses-tab">
                                        <div class="row">
                                            @foreach ($courses as $course)
                                            <div class="col-md-6 mb-4">
                                                @include('frontend.inc.course_showcase')
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-pills-review" role="tabpanel" aria-labelledby="pills-pills-review-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="instructor-rating-area d-flex">
                                                    <div class="rating-number">
                                                        <h2>4.6</h2>
                                                        <div class="rating-icon">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                    </svg>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                    </svg>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                    </svg>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                    </svg>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewbox="0 0 16 16">
                                                                        <path d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"></path>
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
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="rating-range-item-bar">
                                                                <div class="rating-width" style="width: 23%;"></div>
                                                            </div>
                                                            <div class="rating-range-item-percent">
                                                                <p>59%</p>
                                                            </div>
                                                        </div>
                                                        <div class="rating-range-item d-flex align-items-center four-star">
                                                            <div class="rating-range-item-ratings">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="rating-range-item-bar">
                                                                <div class="rating-width" style="width: 60%;"></div>
                                                            </div>
                                                            <div class="rating-range-item-percent">
                                                                <p>31%</p>
                                                            </div>
                                                        </div>
                                                        <div class="rating-range-item d-flex align-items-center three-star">
                                                            <div class="rating-range-item-ratings">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="rating-range-item-bar">
                                                                <div class="rating-width" style="width: 50%;"></div>
                                                            </div>
                                                            <div class="rating-range-item-percent">
                                                                <p>1%</p>
                                                            </div>
                                                        </div>
                                                        <div class="rating-range-item d-flex align-items-center two-star">
                                                            <div class="rating-range-item-ratings">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="rating-range-item-bar">
                                                                <div class="rating-width" style="width: 95%;"></div>
                                                            </div>
                                                            <div class="rating-range-item-percent">
                                                                <p>1%</p>
                                                            </div>
                                                        </div>
                                                        <div class="rating-range-item d-flex align-items-center one-star">
                                                            <div class="rating-range-item-ratings">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <svg class="fill-star feather feather-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="rating-range-item-bar">
                                                                <div class="rating-width" style="width: 39%;"></div>
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
                                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    All Rating
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    <li><button class="dropdown-item" type="button">Rating</button></li>
                                                                    <li><button class="dropdown-item" type="button">Another Rating</button></li>
                                                                    <li><button class="dropdown-item" type="button">Rating else here</button></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="students-feedback-item">
                                                        <div class="feedback-rating">
                                                            <div class="feedback-rating-start">
                                                                <div class="image">
                                                                    <img src="{{asset('images/frontimages/ellipse/user.jpg')}}" alt="Image">
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
                                                            Aliquam eget leo quis neque molestie dictum. Etiam ut tortor tempor, vestibulum ante non, vulputate nibh. Cras non molestie diam. Great Course for Beginner 😀
                                                        </p>
                                                    </div>
                                                    <div class="students-feedback-item">
                                                        <div class="feedback-rating">
                                                            <div class="feedback-rating-start">
                                                                <div class="image">
                                                                    <img src="{{asset('images/frontimages/ellipse/1.png')}}" alt="Image">
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
                                                            Aliquam eget leo quis neque molestie dictum. Etiam ut tortor tempor, vestibulum ante non, vulputate nibh.
                                                        </p>
                                                    </div>
                                                    <div class="students-feedback-item">
                                                        <div class="feedback-rating">
                                                            <div class="feedback-rating-start">
                                                                <div class="image">
                                                                    <img src="{{asset('images/frontimages/ellipse/2.png')}}" alt="Image">
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
                                                            Aenean vulputate nisi ligula. Quisque in tempus sapien. Quisque vestibulum massa eget consequat scelerisque. Phasellus varius risus nec maximus auctor.
                                                        </p>
                                                    </div>
                                                    <div class="students-feedback-item border-0">
                                                        <div class="feedback-rating">
                                                            <div class="feedback-rating-start">
                                                                <div class="image">
                                                                    <img src="{{asset('images/frontimages/ellipse/3.png')}}" alt="Image">
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
                                                            Cras non molestie diam. Aenean vulputate nisi ligula. Quisque in tempus sapien. Quisque vestibulum massa eget consequat scelerisque.
                                                        </p>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="button button-md button--primary-outline">Load more</button>
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
                                                        <button type="submit" class="button button-lg button--primary float-end">Post Review</button>
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
            </section>
            <!-- Instructor Courses Ends Here -->
@endsection


@section('script')
<script>
    // Toggle Menu
    const toggleMenu = document.querySelector(".menu-icon-container");
    const sidebar = document.querySelector(".navbar-mobile");
    const crossSidebar = document.querySelector(".navbar-mobile--cross");
    let menuicon = document.querySelector(".menu-icon");

    toggleMenu.addEventListener("click", function () {
        sidebar.classList.toggle("show");
        document.body.classList.toggle("over");
    });

    crossSidebar.addEventListener("click", function () {
        sidebar.classList.remove("show");
        menuicon.classList.remove("transformed");
    });

    var navMenu = [].slice.call(document.querySelectorAll(".navbar-mobile__menu-item"));

    for (var y = 0; y < navMenu.length; y++) {
        navMenu[y].addEventListener("click", function () {
            menuClick(this);
        });
    }

    function menuClick(current) {
        const active = current.classList.contains("open");
        navMenu.forEach((el) => el.classList.remove("open"));
        if (active) {
            current.classList.remove("open");
        } else {
            current.classList.add("open");
        }
    }

    $(".my-rating").starRating({
        starSize: 30,
        activeColor: "#FF7A1A",
        hoverColor: "#FF7A1A",
        ratedColors: ["#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A"],
        starShape: "rounded",
    });
    $(".menu-icon-container").on("click", function () {
        $(".menu-icon").toggleClass("transformed");
    });
</script>
@endsection

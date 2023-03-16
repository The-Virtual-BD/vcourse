@extends('frontend.layouts.app')

@section('content')

<!-- Header Starts Here -->
<section class="bg-transparent">
    <div class="container-fluid">
        <div class="coursedescription-header">
            <div class="coursedescription-header-start">
                <div class="topic-info">
                    <div class="topic-info-arrow d-none">
                        <a href="#">
                            <svg width="24" height="25" viewbox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5 19.5L8.5 12.5L15.5 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="topic-info-text">
                        <h6 class="font-title--xs"><a href="#">{{$course->name}}</a></h6>
                        <div class="lesson-hours">
                            <div class="book-lesson">
                                <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 2.75H6C6.79565 2.75 7.55871 3.06607 8.12132 3.62868C8.68393 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 8.76295 15.081 8.34099 14.659C7.91903 14.2371 7.34674 14 6.75 14H1.5V2.75Z" stroke="#00AF91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M16.5 2.75H12C11.2044 2.75 10.4413 3.06607 9.87868 3.62868C9.31607 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 9.23705 15.081 9.65901 14.659C10.081 14.2371 10.6533 14 11.25 14H16.5V2.75Z" stroke="#00AF91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>{{$course->number_of_lessons}} Lesson</span>
                            </div>
                            <div class="totoal-hours">
                                <svg width="18" height="19" viewbox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17C13.1421 17 16.5 13.6421 16.5 9.5C16.5 5.35786 13.1421 2 9 2C4.85786 2 1.5 5.35786 1.5 9.5C1.5 13.6421 4.85786 17 9 17Z" stroke="#FF7A1A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9 5V9.5L12 11" stroke="#FF7A1A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>{{$course->time_duration}} Hours</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coursedescription-header-end d-none">
                <!-- <a href="#" class="rating-link" data-bs-toggle="modal" data-bs-target="#ratingModal">Leave a Rating</a> -->
                <a href="#" class="button button--text" data-bs-toggle="modal" data-bs-target="#ratingModal">Leave a Rating</a>

                <!-- <a href="#" class="btn btn-primary regular-fill-btn">Next Lession</a> -->
                <button class="button button--primary d-none">Next Lession</button>
            </div>
        </div>
    </div>
</section>
<!-- Header Ends Here -->


<div class="container"><!--latest-->
    <div class="row">
        <!-- Tab contents -->
        <div class="col-md-9">
          <div class="container">
            <div id="accordion-right-tabs" class="tab-content accordion">
              <!-- Individual tab panels -->
              <!-- tab-pane must be a child of tab-content -->
                @php $i = 1; @endphp

                @foreach ($lessons as $lesson)

                <div id="right-{{$lesson->id}}" class="tab-pane fade accordion-item @if ($i === 1) show active @endif" role="tabpanel">
                    <div class="video-area">
                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="{{$lesson->media_link}}?h=7dbeb59448&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;title=0&amp;byline=0&amp;portrait=0&amp;sidedock=0" frameborder="0"  allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="VCourse Video Intro"></iframe></div>
                    </div>
                    <div class="course-description-start-content">
                        <h5 class="font-title--sm">{{$i.". ".$lesson->name}}</h5>

                        <nav class="course-description-start-content-tab">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                <button class="nav-link active px-2" id="nav-ldescrip-{{$lesson->id}}-tab" data-bs-toggle="tab" data-bs-target="#nav-ldescrip-{{$lesson->id}}" type="button" role="tab" aria-controls="nav-ldescrip-{{$lesson->id}}" aria-selected="true">
                                    Lesson Description
                                </button>

                                <button class="nav-link px-2" id="nav-lnotes-{{$lesson->id}}-tab" data-bs-toggle="tab" data-bs-target="#nav-lnotes-{{$lesson->id}}" type="button" role="tab" aria-controls="nav-lnotes-{{$lesson->id}}" aria-selected="false">Lesson Notes</button>
                            </div>
                        </nav>
                        <div class="tab-content course-description-start-content-tabitem" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ldescrip-{{$lesson->id}}" role="tabpanel" aria-labelledby="nav-ldescrip-{{$lesson->id}}-tab">
                                <!-- Lesson Description Starts Here -->
                                <div class="lesson-description">
                                    <p>{{$lesson->description}}</p>
                                </div>
                                <!-- Lesson Description Ends Here -->
                            </div>
                            <div class="tab-pane fade" id="nav-lnotes-{{$lesson->id}}" role="tabpanel" aria-labelledby="nav-lnotes-{{$lesson->id}}-tab">
                                <!-- Course Notes Starts Here -->
                                <div class="course-notes-area">
                                    <div class="course-notes">
                                        <div class="course-notes-item">
                                            <div class="dot"></div>
                                            <p>
                                                {{$lesson->note}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Course Notes Ends Here -->
                            </div>
                        </div>
                    </div>
                </div>
                @php $i++; @endphp

                @endforeach

            </div>
          </div>
        </div>

        <!-- Tabs -->
        <div class="col-md-3">
            <div class="videolist-area-heading">
                <h6>Course Contents</h6>
            </div>
            <div class="videolist-area-bar">
                <div class="progress">
                    <div class="progress-bar  bg-${2|success,info,success,warning,wardanger}}" role="progressbar" style="width: {{$progress}}%;"
                        aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" ${6| ,progress-bar-animated}>{{$progress}}% Completed</div>
                </div>
            </div>
            <ul class="nav nav-tabs right-tabs" role="tablist">
                @php $j = 1; @endphp
                @foreach ($lessons as $lesson)
                <li class="nav-item w-100" role="presentation">
                <div id="right-{{$lesson->id}}-tab" class="nav-link tab-clickable @if ($j === 1) active @endif" role="tab" data-bs-toggle="tab" data-bs-target="#right-{{$lesson->id}}" aria-controls="right-{{$lesson->id}}" aria-selected="false">
                    <div class="main-wizard">
                        <div class="main-wizard__wrapper ">
                            <a class="main-wizard-start d-flex">
                                <div class="main-wizard-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                    </svg>
                                </div>
                                <div class="main-wizard-title" style="margin-left: 20px">
                                    <p style="margin-bottom: 0 ">{{$lesson->name}}</p>
                                </div>
                            </a>
                            <div class="main-wizard-end d-flex align-items-center ">
                                <div class="form-check d-none">
                                    <input class="form-check-input" type="checkbox" value="" style="border-radius: 0px; margin-left: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                @php $j++; @endphp
                @endforeach

            </ul>
        </div>
    </div>
</div>

<!-- Rating Modal -->
<div class="modal fade modal--rating" id="ratingModal" tabindex="-1" aria-labelledby="ratingModal" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave A Rating</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center pt-0 pb-0">
                <div class="modal-body-rating">
                    <p>4.5 <span>(Good/Amazing)</span></p>
                    <div class="my-rating rating-icons rating-icons-modal"></div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="#" class="w-100">
                    <label for="messages">Message</label>
                    <textarea id="messages" placeholder="How is your to feeling taking these course?" class="w-100"></textarea>
                    <button type="submit" class="button button-md button--primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    // $(".my-rating").starRating({
    //     starSize: 30,
    //     activeColor: "#FF7A1A",
    //     hoverColor: "#FF7A1A",
    //     ratedColors: ["#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A"],
    //     starShape: "rounded",
    // });



</script>
@endsection







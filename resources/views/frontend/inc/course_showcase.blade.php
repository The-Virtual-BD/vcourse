<div class="contentCard contentCard--course h-100 justify-content-between">
    <div class="contentCard-top">
        <a href="{{ route('courses.show', $course->id) }}">
            @if ($course->thumbnail == null)
            <img src="{{asset('images/vcourse_dummy_thumbnail_370_280.jpg')}}" alt="images" class="img-fluid">
            @else
            <img src="{{asset($course->thumbnail)}}" alt="images" class="img-fluid">
            @endif
        </a>
    </div>
    <div class="contentCard-bottom">
        <h5>
            <a href="{{ route('courses.show', $course->id) }}" class="font-title--card">{{$course->name}}</a>
        </h5>
        <div class="contentCard-info d-flex align-items-center justify-content-between">
            <a href="@auth @if ($course->user->id == Auth::user()->id)
                {{route('profile.myprofile', Auth::user()->id)}}
            @else
                {{route('profile.instructor', $course->user->id)}}
            @endif
            @endauth
            @guest
            {{route('profile.instructor', $course->user->id)}}
            @endguest" class="contentCard-user d-flex align-items-center">
                @if ($course->user->profile_picture == null)
                <img src="{{asset('images/avatar.svg')}}" alt="Instructor">
                @else
                <img src="{{asset($course->user->profile_picture)}}" alt="client-image" class="rounded-circle" style="width: 23%;">
                @endif
                <p class="font-para--md">{{$course->user->name}}</p>
            </a>
            <div class="price">
                <span>&#2547;{{$course->price}}</span>
                <del>&#2547;{{$course->old_price}}</del>
            </div>
        </div>
        <div class="contentCard-more d-flex justify-content-between">
            <div class="d-flex align-items-center d-none">
                <div class="icon">
                    <img src="{{asset('images/frontimages/icon/star.png')}}" alt="star">
                </div>
                <span>4.5</span>
            </div>
            <div class="eye d-flex align-items-center d-none">
                <div class="icon">
                    <img src="{{asset('images/frontimages/icon/eye.png')}}" alt="eye">
                </div>
                <span>24,517</span>
            </div>
            <div class="book d-flex align-items-center">
                <div class="icon">
                    <img src="{{asset('images/frontimages/icon/book.png')}}" alt="location">
                </div>
                <span>{{$course->lessons->count()}} Lesson</span>
            </div>
            <div class="clock d-flex align-items-center">
                <div class="icon">
                    <img src="{{asset('images/frontimages/icon/Clock.png')}}" alt="clock">
                </div>
                <span>{{$course->time_duration}} Hours</span>
            </div>
        </div>
    </div>
</div>

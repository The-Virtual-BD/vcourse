@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial -->

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">

            <div class="bg-light p-4 rounded">
                <div class="lead">
                    Frontend Desing and content settings.
                    <hr>
                </div>
                <div class="mt-2">
                    @include('frontend.inc.messages')
                </div>

                <!--  About Services Starts Here -->
                <section class="">
                    <div class="">
                        <div class="row">
                            <div class="col">
                                <p class="lead">Home page testimonial</p>
                                <p id="testimonialmsg"></p>
                            </div>
                        </div>
                        <div class="row testimonial d-flex">
                            @foreach ($testimonials as $testimonial)
                            <div class="col-md-4 col-sm-12 position-relative px-3  overflow-didden mb-3 stretch-card">
                                <div class="p-4 bg-white rounded">
                                    <p>"{!!$testimonial->rev_text!!}"</p>
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
                                    </div>
                                    <div class=" text-right">
                                        {!! Form::open(['method' => 'DELETE','route' => ['testimonials.destroy', $testimonial->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-md-4 col-sm-12 position-relative px-3  overflow-didden mb-3">
                                <form action="{{route('testimonials.store')}}" method="POST" id="testimonialform" enctype="multipart/form-data">
                                    @csrf
                                    <div class="p-4 bg-white rounded">
                                        <textarea name="rev_text" id="rev_text" id="" rows="4" class="w-100 form-control" placeholder="Write testimonial text"></textarea>
                                        <div class="testimonial__user-wrapper d-flex justify-content-between mt-3">
                                            <div class="testimonial__user d-flex align-items-center">
                                                <div class="testimonial__user-img">
                                                    <img src="{{asset('images/frontimages/avatar/avatar-img-01.png')}}" alt="Client" id="testimoniImg">

                                                </div>
                                                <div class="testimonial__user-info ml-3">
                                                    <input class="mb-2" type="text" name="name" id="name" placeholder="Name" required>
                                                    <input class="mb-2" type="text" name="designation" id="designation" placeholder="Designation" required>
                                                    <input type="number" name="rev_number" id="rev_number" max="5" step="1" class="" placeholder="Review" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mt-2">
                                            <input type="file" name="rev_photo" id="rev_photo" class="w-20" onchange="document.getElementById('testimoniImg').src = window.URL.createObjectURL(this.files[0])">
                                            <span>*Should be 64*64px</span>
                                        </div>
                                        <div class=" mt-2 text-right">
                                            <button type="submit" class="btn btn-success btn-sm"> Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- Best Instructors Starts Here -->
                <section class="">
                    <hr>
                    <div class="row mt-3">
                        <div class="col">
                            <p class="lead">Home page instructor slider</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($teammembers as $teammember)
                        <div class="col-md-3">
                            <div class="mentor">
                                <div class="mentor__img">
                                    <img src="{{asset($teammember->photo)}}" alt="Mentor image" style="max-width: 270px;">
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
                                <div class=" text-right">
                                    {!! Form::open(['method' => 'DELETE','route' => ['teammembers.destroy', $teammember->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-md-3">
                            <form action="{{route('teammembers.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mentor">
                                    <div class="">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid"src="#" alt="" id="mentorImage">
                                        </div>
                                        <ul class="list-group mb-0">
                                            <span>Image size(270*290px)</span>
                                            <li class="list-group-item">
                                                <input type="file" name="photo" id="photo" class="form-control w-100" id="mentorImageinput" onchange="document.getElementById('mentorImage').src = window.URL.createObjectURL(this.files[0])" required>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" name="name" id="name" class="form-control w-100" placeholder="Name" required>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" name="designation" id="designation" class="form-control w-100" placeholder="Designation" required>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="LinkedIn id link" required>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook id link" required>
                                            </li>

                                            <li class="list-group-item text-right">
                                                <input type="submit" value="Add" class="btn btn-success btn-sm">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
ClassicEditor.create(document.querySelector('#rev_text')).catch(error => {
            console.error(error);
        });


</script>
@endsection

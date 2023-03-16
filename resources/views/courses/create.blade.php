
@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')



        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">
            <div class="container mt-4">
                <h4 class="mb-3 card-title">Add new course.</h4>
                <form method="POST" action="{{ route('courses.store') }}" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Course Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="thumbnail" class="col-sm-3 col-form-label">Thumbnail</label>
                                <div class="col-sm-9">
                                    <input type="file" name="coursethumb" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="instructor" class="col-sm-3 col-form-label">Instructor</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="user_id" id="user_id" placeholder="Course instructor" required>
                                    @role('admin')
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id}}">{{ __($instructor->name) }}</option>
                                        @endforeach
                                    @endrole
                                    @role('instructor')
                                            <option value="{{ Auth::user()->id }}" selected>{{Auth::user()->name}}</option>
                                    @endrole
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="category" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="category_id" id="category" placeholder="Select a category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{ __($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{ url('categories/create')}}" class="btn btn-primary"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="price" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" name="price" id="price"  placeholder="Price of this course" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="time_duration" class="col-sm-3 col-form-label">Time Duration</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="time_duration" id="time_duration"  placeholder="Duration of this course in Hour">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="media_link" class="col-sm-3 col-form-label">Intro Vieo link</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="media_link" id="media_link"  placeholder="Have any Introduction video">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="discount" class="col-sm-3 col-form-label">Discount</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" name="discount" id="discount" placeholder="Discount in %">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="timing" class="col-sm-3 col-form-label">Class time</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="timing" id="timing"  placeholder="When this class will be taken">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="venu" class="col-sm-3 col-form-label">Venu</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="venu" id="venu" placeholder="Online or Address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="description" class="col-sm-3 col-form-labe">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="requirments" class="col-sm-3 col-form-labe">Requirments</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="requirments" name="requirments" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="forwho" class="col-sm-3 col-form-labe">For who</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="forwho" name="forwho" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="what_will_learn" class="col-sm-3 col-form-labe">What will learn</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="what_will_learn" name="what_will_learn" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Submit for review</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script>
        ClassicEditor.create(document.querySelector('#forwho')).catch(error => {console.error(error);});
        ClassicEditor.create(document.querySelector('#what_will_learn')).catch(error => {console.error(error);});
        ClassicEditor.create(document.querySelector('#requirments')).catch(error => {console.error(error);});
        ClassicEditor.create(document.querySelector('#description')).catch(error => {console.error(error);});


    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script> --}}
@endsection

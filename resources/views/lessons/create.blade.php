@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')



        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">
            <div class="container mt-4">
                <h4 class="mb-3 card-title">Add lesson to your course.</h4>
                <form method="POST" action="{{ route('lessons.store') }}" class="mt-3">
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
                                <label for="course_id" class="col-sm-3 col-form-label">Parent Course</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="course_id" id="course_id"
                                        placeholder="Select Course">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ __($course->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Lesson Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="thumbnail" class="col-sm-3 col-form-label">Thumbnail</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                        placeholder="Course thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="media_link" class="col-sm-3 col-form-label">Intro Vieo link</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="media_link" id="media_link"
                                        placeholder="Please provide the video link">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="description" class="col-sm-3 col-form-labe">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label for="note" class="col-sm-3 col-form-labe">Note</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="note" id="note" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-primary">Publish</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        ClassicEditor.create(document.querySelector('#description')).catch(error => {
            console.error(error);
        });
        ClassicEditor.create(document.querySelector('#note')).catch(error => {
            console.error(error);
        });
    </script>
@endsection

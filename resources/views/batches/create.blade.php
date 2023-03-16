@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">

            <div class="bg-light p-4 rounded">
                <div class="lead">
                    Add new Batch to a course.
                </div>

                {{--
                $batch->last_ennrollment_date = $request->last_ennrollment_date;
                $batch->class_starting_date = $request->class_starting_date; --}}

                <div class="container mt-4">
                    <div class="col">
                        <div class="card">
                            <form method="POST" action="{{ route('batches.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="">
                                            <label for="name" class="form-label">Course</label>
                                            <select name="course_id" id="course_id" class="form-control" required>
                                                <option value="0">Plese select one</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course_id'))
                                                <span class="text-danger text-left">{{ $errors->first('course_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="">
                                            <label for="number" class="form-label">Batch number</label>
                                            <input value="{{ old('number') }}"
                                                type="number"
                                                class="form-control"
                                                name="number"
                                                placeholder="Number" required>

                                            @if ($errors->has('number'))
                                                <span class="text-danger text-left">{{ $errors->first('number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="">
                                            <label for="max_seat" class="form-label">Maximum number of student allowed.</label>
                                            <input value="{{ old('max_seat') }}"
                                                type="number"
                                                class="form-control"
                                                name="max_seat"
                                                placeholder="30" required>

                                            @if ($errors->has('max_seat'))
                                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="">
                                            <label for="last_ennrollment_date" class="form-label">Last Ennrollment Date</label>
                                            <input value="{{ old('last_ennrollment_date') }}"
                                                type="date"
                                                class="form-control"
                                                name="last_ennrollment_date"
                                                placeholder="30" required>

                                            @if ($errors->has('last_ennrollment_date'))
                                                <span class="text-danger text-left">{{ $errors->first('last_ennrollment_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <div class="">
                                            <label for="class_starting_date" class="form-label">Class Starting Date</label>
                                            <input value="{{ old('class_starting_date') }}"
                                                type="date"
                                                class="form-control"
                                                name="class_starting_date"
                                                placeholder="30" required>

                                            @if ($errors->has('class_starting_date'))
                                                <span class="text-danger text-left">{{ $errors->first('class_starting_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Save this batch</button>
                                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection

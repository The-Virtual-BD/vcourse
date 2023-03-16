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
                    Course: {{$batch->course->name}}
                </div>
                <div class="row mt-2">
                    <div class="col-md-2 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Batch Number:</p>
                                <p class="fs-30 mb-2">{{$batch->number}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Enrolled Student:</p>
                                <p class="fs-30 mb-2">{{$batch->enrolled_students ?? 0}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Status:</p>
                                <p class="fs-30 mb-2"><?php
                                    if ($batch->status == 1) {
                                        echo 'Starting Soon';
                                    }elseif ($batch->status == 2) {
                                        echo 'Running';
                                    }else {
                                        echo 'Complete';
                                    }
                                ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                            <p class="mb-4">Max Seat:</p>
                            <p class="fs-30 mb-2">{{$batch->max_seat}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="d-flex justify-content-between w-100">

                        <h5>Lessons</h5>

                        <a href="{{ route('lessons.create') }}" class="btn btn-primary btn-sm mb-2">Add Lesson</a>
                    </div>
                    <div class="col-md-12 border border-primary">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" width="10%">Name</th>
                                <th scope="col" width="15%">Media Link</th>
                                <th scope="col" colspan="3" width="1%"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($batch->lessons as $lesson)
                                    <tr>
                                        <td width="10%">{{ $lesson->name }}</td>
                                        <td width="15%">
                                            {{ \Illuminate\Support\Str::limit($lesson->media_link, 50, $end='...') }}
                                        </td>
                                        <td><a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE','route' => ['lessons.destroy', $lesson->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-4" >
                    <div class="d-flex justify-content-between w-100">
                        <h5>Students</h5>
                        <div class="btn-group mb-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm">SMS</button>
                            <button type="button" class="btn btn-info btn-sm">Email</button>
                        </div>
                    </div>
                    <div class="col-md-12 border border-primary">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" width="10%">Name</th>
                                <th scope="col" width="15%">Email</th>
                                <th scope="col" width="15%">Phone</th>
                                {{-- <th scope="col" colspan="3" width="1%"></th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($batch->students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone_number }}</td>
                                        {{-- <td><a href="{{ route('batches.show', $batch->id) }}" class="btn btn-info btn-sm">Show</a></td>
                                        <td><a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE','route' => ['batches.destroy', $batch->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection

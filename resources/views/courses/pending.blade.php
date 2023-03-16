@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">
            <div class="bg-light p-4 rounded">
                <div class="mt-2">
                    @include('frontend.inc.messages')
                </div>

                <div class="lead">
                    Pending Courses waiting for admin verification.
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Title</th>
                        <th scope="col">Instructor</th>
                        <th scope="col" width="10%">Price</th>
                        <th scope="col" width="10%">Category</th>
                        <th scope="col" width="10%">Status</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingCourses as $course)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$course->name}}">{{ substr($course->name, 0, 10) }}</td>
                                <td>{{ $course->user->name }}</td>
                                <td>{{ $course->price }}</td>
                                <td>
                                @if ( $course->category == null)
                                        Uncatagorized
                                    @elseif ($course->category != null)
                                        {{$course->category->name}}
                                    @endif
                                <td>{{ $course->status}}</td>
                                <td>
                                    {!! Form::open(['method' => 'POST','route' => ['courses.approve', $course->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Approve', ['class' => 'btn btn-info btn-sm']) !!}
                                    {!! Form::hidden('status', 'approved') !!}
                                    {!! Form::close() !!}
                                </td>
                                <td><a href="{{ route('courses.show', $course->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $course->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

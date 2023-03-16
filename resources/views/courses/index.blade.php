@extends('layouts.app')

@section('content')

    <h1 class="mb-3">Laravel 8 course Roles and Permissions Step by Step Tutorial - codeanddeploy.com</h1>

    <div class="bg-light p-4 rounded">
        <h1>courses</h1>
        <div class="lead">
            Manage your courses here.
            <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm float-right">Add new course</a>
        </div>

        <div class="mt-2">
            @include('frontend.inc.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">coursename</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $course->id }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->email }}</td>
                        <td>{{ $course->coursename }}</td>
                        <td><a href="{{ route('courses.show', $course->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('courses.edit', $course->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $course->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $courses->links() !!}
        </div>

    </div>
@endsection

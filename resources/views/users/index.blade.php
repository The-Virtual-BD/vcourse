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
                    Total User {{$tortalUser}}
                </div>
                <div class="lead">
                    Admins
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="10%">Username</th>
                        <th scope="col" width="10%">Roles</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <th scope="row">{{ $admin->id }}</th>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>
                                    @foreach($admin->roles as $role)
                                        <span
                                        class="badge     @if ($role->name === "admin")
                                                        bg-primary
                                                        @elseif($role->name === "student")
                                                        bg-success
                                                        @else
                                                        bg-warning
                                                        @endif">
                                    {{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('users.show', $admin->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                                <td><a href="{{ route('users.edit', $admin->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $admin->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="lead mt-5">
                    Instructors
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="10%">Username</th>
                        <th scope="col" width="10%">Roles</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($instructors as $instructor)
                            <tr>
                                <th scope="row">{{ $instructor->id }}</th>
                                <td>{{ $instructor->name }}</td>
                                <td>{{ $instructor->email }}</td>
                                <td>{{ $instructor->username }}</td>
                                <td>
                                    @foreach($instructor->roles as $role)
                                        <span
                                        class="badge     @if ($role->name === "admin")
                                                        bg-primary
                                                        @elseif($role->name === "student")
                                                        bg-success
                                                        @else
                                                        bg-warning
                                                        @endif">
                                    {{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('users.show', $instructor->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                                <td><a href="{{ route('users.edit', $instructor->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $instructor->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="lead mt-5">
                    Students
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add new student</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="10%">Username</th>
                        <th scope="col" width="10%">Roles</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->username }}</td>
                                <td>
                                    @foreach($student->roles as $role)
                                        <span
                                        class="badge     @if ($role->name === "admin")
                                                        bg-primary
                                                        @elseif($role->name === "student")
                                                        bg-success
                                                        @else
                                                        bg-warning
                                                        @endif">
                                    {{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('users.show', $student->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                                <td><a href="{{ route('users.edit', $student->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $student->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection

@section('script')
    <script>
        // $(document).ready( function () {
        //     $('#coursetable').DataTable();
        //     // $('#table_id').DataTable();
        // } );
    </script>
@endsection



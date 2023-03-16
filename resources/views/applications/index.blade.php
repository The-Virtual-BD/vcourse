@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')



        <!-- partial -->

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">

            <div class="bg-light p-4 rounded">
                <div class="lead">
                    Manage your instructor applications here here.
                </div>

                <div class="mt-2">
                    @include('frontend.inc.messages')
                </div>

                <table class="table table-bordered">
                <tr>
                    <th width="1%">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Experties</th>
                    <th>status</th>
                    <th width="3%" colspan="3">Action</th>
                </tr>
                    @foreach ($applications as $application)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $application->user->name }}</td>
                        <td>{{ $application->user->email }}</td>
                        <td>{{ $application->user->phone_number }}</td>
                        <td>{{ $application->user->experties }}</td>
                        <td>
                            @if ($application->status == 1)
                            Pending
                            @elseif ($application->status == 2)
                            Approved
                            @else
                            Rejected
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method' => 'POST','route' => ['applications.cv', $application->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('CV', ['class' => 'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                        @if ($application->status == 1)
                        <td>
                            {!! Form::open(['method' => 'POST','route' => ['applications.approve', $application->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Approve', ['class' => 'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                        @endif

                        <td>
                            {!! Form::open(['method' => 'POST','route' => ['applications.reject', $application->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Reject', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

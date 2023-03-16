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
                    Manage your batches here.
                    <a href="{{ route('batches.create') }}" class="btn btn-primary btn-sm float-right">Add batches</a>
                </div>

                <div class="mt-2">
                    @include('frontend.inc.messages')
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="15%">#</th>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="15%">Seat Quantity</th>
                        <th scope="col" width="15%">Enrolled Student</th>
                        <th scope="col" width="5%">Status</th>
                        <th scope="col" colspan="3" width="1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($batches as $batch)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $batch->name }}</td>
                                <td>{{ $batch->max_seat }}</td>
                                <td>{{ $batch->enrolled_students }}</td>
                                <td class="text-capitalize">
                                    <?php
                                        if ($batch->status == 1) {
                                            echo 'Starting Soon';
                                        }elseif ($batch->status == 2) {
                                            echo 'Running';
                                        }else {
                                            echo 'Complete';
                                        }
                                    ?>
                                </td>
                                <td><a href="{{ route('batches.show', $batch->id) }}" class="btn btn-info btn-sm">Show</a></td>
                                <td><a href="{{ route('batches.edit', $batch->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['batches.destroy', $batch->id],'style'=>'display:inline']) !!}
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

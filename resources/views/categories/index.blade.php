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
                    Manage your categories here.
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-right">Add category</a>
                </div>

                <div class="mt-2">
                    @include('frontend.inc.messages')
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Sirial</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Guard</th>
                        <th scope="col" colspan="3" width="1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $i++; }}</td>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
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
    <!-- page-body-wrapper ends -->
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#categorytable').DataTable();
            // $('#table_id').DataTable();
        } );
    </script>
@endsection


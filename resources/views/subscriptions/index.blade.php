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
                    All News Letter Subscriptions.
                    {{-- <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a> --}}
                </div>

                <div class="mt-2">
                    @include('frontend.inc.messages')
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="15%">#</th>
                        <th scope="col" width="10%">Email</th>
                        <th scope="col" colspan="3" width="1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $subscription->email }}</td>
                                <td class="text-capitalize">{{ $subscription->status }}</td>
                                {{-- <td><a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-info btn-sm">Edit</a></td> --}}
                                <td></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['subscriptions.destroy', $subscription->id],'style'=>'display:inline']) !!}
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


@section('script')
    <script>

    </script>
@endsection

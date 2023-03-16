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
                    {{ $user->name }}
                </div>

                <div class="container mt-4 ">
                    <div class="row">
                        <div class="col-md-4">


                            <div class="card" style="width: 18rem;">
                                <img src="{{asset($user->profile_picture)}}" class="card-img-top" alt="{{ $user->name }}'s Photo">
                                <div class="card-body">
                                  <h5 class="card-title">Name: {{ $user->name }}</h5>
                                  <p class="card-text">Email: {{ $user->email }}</p>
                                  <p class="card-text">Username: {{ $user->username }}</p>
                                  <p class="card-text">Phone: {{ $user->phone_number }}</p>
                                  <div class="mt-4">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ route('users.index') }}" class="btn btn-default btn-sm">Back</a>
                                </div>
                                </div>
                            </div>

                            <div>

                            </div>
                            <div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

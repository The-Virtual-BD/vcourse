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
                    Add new course category.
                </div>

                <div class="container mt-4">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ old('name') }}"
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save category</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


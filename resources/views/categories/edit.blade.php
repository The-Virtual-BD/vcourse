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
                    Editing category.
                </div>

                <div class="container mt-4">

                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <input value="{{ $category->name }}"
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save Category</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


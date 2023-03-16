@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">


            {{-- present table ----------------------------------------------------------------------------------------- --}}
            <div class="bg-light p-4 rounded">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Instructor</th>
                        <th scope="col">Category</th>
                        <th scope="col" width="5%">Price</th>
                        <th scope="col" width="5%">Discount</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    @if ( $course->name)
                                    {{ $course->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ( $course->user->name )
                                    {{ $course->user->name  }}
                                    @endif
                                </td>
                                <td>
                                    @if ( $course->category == null)
                                        Uncatagorized
                                    @elseif ($course->category /= null)
                                        {{$course->category->name}}
                                    @endif
                                </td>
                                <td>
                                    @if ( $course->old_price)
                                    {{ $course->old_price }}TK
                                    @endif
                                </td>
                                <td>
                                    @if ( $course->discounte)
                                    {{ $course->discount }}%
                                    @else
                                    No discount
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    {!! Form::open(['method' => 'POST','route' => ['courses.approve', $course->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Approve', ['class' => 'btn btn-info btn-sm']) !!}
                                    {!! Form::hidden('status', 'approved') !!}
                                    {!! Form::close() !!}
                                </td>
                                <td><a href="{{ url()->previous() }}" class="btn btn-dark btn-sm">Back</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $course->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

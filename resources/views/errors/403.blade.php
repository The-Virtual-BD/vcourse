@extends('frontend.layouts.app')

@section('content')
            <!-- 404 Area Starts Here -->
            <section class="error-area overflow-hidden">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-start order-2 order-lg-0">
                            <div class="error-area-start">
                                <h2 class="font-title--md">You don't have the permission.</h2>
                                @guest
                                <p class="font-para--lg">
                                    Please Contact Admin To accessing this.
                                </p>
                                <a href="{{route('home.index')}}" class="button button-lg button--primary">Go Home</a>

                                @endguest

                                @role('admin')
                                <p class="font-para--lg">
                                    Please Create this ({{Route::current()->getName()}}) permission and assign to your role.
                                </p>
                                <a href="{{url('permissions/create')}}" class="button button-lg button--primary btn-sm">Create Permission</a>
                                @endrole
                            </div>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-0">
                            <div class="text-center">
                                <h1>Access <br/> Resticted.</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="error-area-shape">
                    {{-- <img src="{{asset('images/frontimages/404/shape01.png')}}" alt="shape" class="img-fluid shape-01"> --}}
                    <img src="{{asset('images/frontimages/404/shape02.png')}}" alt="shape" class="img-fluid shape-02">
                </div>
            </section>
            <!-- 404 Area Ends Here -->
@endsection


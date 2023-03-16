@extends('frontend.layouts.app')

@section('content')

        <!-- Breadcrumb Starts Here -->
        <div class="py-0 d-none">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb align-items-center bg-transparent mb-0">
                        <li class="breadcrumb-item"><a href="index.html.htm" class="fs-6 text-secondary">Home</a></li>
                        <li class="breadcrumb-item active"><a href="cart.html.htm" class="fs-6 text-secondary">Cart</a></li>
                    </ol>
                </nav>
            </div>
        </div>





        <!-- Breadcrumb Ends Here -->
        @if ($cart->count())
        <!-- Cart Section Starts Here -->
        <section class="section cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h6 class="cart-area__label">{{$cart->count()}} Courses in Cart</h6>
                        @foreach ($cart as $item)
                        @php
                            $course = \App\Models\Course::with('user','category','lessons','nextBatch')->find($item->id);
                        @endphp
                        <div class="cart-wizard-area">
                            <div class="image">
                                <img src="{{asset($course->thumbnail)}}" alt="product">
                            </div>
                            <div class="text">
                                <h6><a href="#">{{$course->name}}</a></h6>
                                <p>By <a href="{{route('profile.instructor',$course->user->id)}}">{{$course->user->name}}</a></p>
                                <div class="bottom-wizard d-flex justify-content-between align-items-center">
                                    <p>
                                        {{$course->price}} <span><del>{{$course->old_price}}</del></span>
                                    </p>


                                    <form action="{{route('cart.remove',$item->rowId)}}" method="post">
                                        @csrf
                                        <input type="submit" value="Remove" class="btn btn-primary me-2">
                                    </form>


                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                            {{-- rowId	"a775bac9cff7dec2b984e023b95206aa"
                            id	3
                            name	"Adobe illustrator Basic with Baker vai."
                            qty	3
                            price	1800
                            options	[]
                            tax	"378.00"
                            isSaved	false
                            subtotal	"5400.00" --}}
                    <div class="col-lg-4">
                        <h6 class="cart-area__label">Summery</h6>
                        <div class="summery-wizard">
                            <div class="summery-wizard-text pt-0">
                                <h6>Subtotal</h6>
                                <p>&#2547;{{Cart::subtotal()}}</p>
                            </div>
                            {{-- <div class="summery-wizard-text">
                                <h6>Coupon Discount</h6>
                                <p>70%</p>
                            </div> --}}
                            <div class="summery-wizard-text d-none">
                                <h6>taxes</h6>
                                <p>{{Cart::tax()}}</p>
                            </div>
                            <div class="total-wizard">
                                <h6 class="font-title--card">Total:</h6>
                                <p class="font-title--card">&#2547;{{Cart::total()}}</p>
                            </div>
                            <a href="{{route('cart.checkoutpage')}}" class="button button-lg button--primary form-control mb-lg-3">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @else
        <section class="section cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 min-vh-100 text-center">
                        <h6 class="cart-area__label">No course In this Cart</h6>
                        <div class="cart-wizard-area d-flex justify-content-center">
                            <a href="{{route('courses.index')}}" class="text-center btn btn-primary">
                                Let's go and buy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

@endsection

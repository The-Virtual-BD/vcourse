@extends('frontend.layouts.app')

@section('content')

        <!-- Checkout Area Starts Here -->
        <section class=" checkout-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 checkout-area-checkout">
                        <h6 class="checkout-area__label">Checkout</h6>
                        <div class="checkout-tab">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="" role="tabpanel">
                                    <form action="{{route('cart.checkout')}}" method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="">
                                            <label for="card-name-one">Customer Name</label>
                                            <input type="text" name="customer_name" class="form-control" placeholder="Type here" id="card-name-one" required>
                                        </div>
                                        <div class="">
                                            <label for="card-number-one">Customer Phone</label>
                                            <input type="text" name="customer_phone" class="form-control" onkeypress='validate(event)' placeholder="Type here" id="card-number-one" required>
                                        </div>
                                        <div class="">
                                            <label for="card-number-one">Address</label>
                                            <input type="text" name="customer_address" class="form-control" placeholder="Type here" id="card-number-one" required>
                                        </div>
                                        <div class="">
                                            <label for="card-number-one">City</label>
                                            <input type="text" name="customer_city" class="form-control" placeholder="Type here" id="card-number-one" required>
                                        </div>
                                        <button type="submit" class="button button-lg button--primary w-100 mt-3">Confirm Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="checkout-area-summery">
                            <h6 class="checkout-area__label">Summery</h6>

                            <div class="cart">
                                <div class="cart__includes-info cart__includes-info--bordertop-0">
                                    <div class="productContent__wrapper">
                                        @foreach ($cart as $item)

                                        @php
                                            $course = \App\Models\Course::with('user','category','lessons','nextBatch')->find($item->id);
                                        @endphp
                                        <div class="productContent">
                                            <div class="productContent-item__img productContent-item">
                                                <img src="{{asset($course->thumbnail)}}" alt="checkout">
                                            </div>
                                            <div class="productContent-item__info productContent-item">
                                                <h6 class="font-para--lg">
                                                    <p>{{$course->name}}</p>
                                                </h6>
                                                <p>{{$course->user->name}}</p>
                                                <div class="price">
                                                    <h6 class="font-para--md">{{$course->price}}</h6>
                                                    <p><del>{{$course->old_price}}</del></p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="cart__checkout-process">
                                    <ul>
                                        <li>
                                            <p class="font-title--card">Total:</p>
                                            <p class="total-price font-title--card">&#2547;{{Cart::total()}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout Area Ends Here -->
@endsection


@section('script')
<script>
    function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

</script>

@endsection


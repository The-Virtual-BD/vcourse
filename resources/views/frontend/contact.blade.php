@extends('frontend.layouts.app')
@section('content')

        <!-- Get in Touch Area Starts Here -->
        <section class="getin-touch overflow-hidden" style="background-image: url('{{asset('images/frontimages/contact/bg.png')}}')}});">
            <div class="container">
                <div class="row">
                    <h2 class="font-title--md text-center">Get in Touch</h2>
                    <div class="col-lg-5 pe-lg-4 position-relative mb-4 mb-lg-0">
                        <div class="contact-feature d-flex align-items-center">
                            <div class="contact-feature-icon primary-bg">
                                <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clipOne)">
                                        <path d="M1.33325 8.00033V29.3337L10.6666 24.0003L21.3333 29.3337L30.6666 24.0003V2.66699L21.3333 8.00033L10.6666 2.66699L1.33325 8.00033Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M10.6667 2.66699V24.0003" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21.3333 8V29.3333" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    <defs>
                                        <clippath>
                                            <rect width="32" height="32" fill="white"></rect>
                                        </clippath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="contact-feature-text">
                                <h6>Address</h6>
                                <p>Home 234, Phase-2, Road 10,</p>
                                <p> Sonadanga, Khulna, Bangladesh</p>
                            </div>
                        </div>

                        <div class="contact-feature d-flex align-items-center my-lg-4 my-3">
                            <div class="contact-feature-icon tertiary-bg">
                                <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.06115 4.57129H27.2652C28.7918 4.57129 30.0407 5.857 30.0407 7.42843V24.5713C30.0407 26.1427 28.7918 27.4284 27.2652 27.4284H5.06115C3.53462 27.4284 2.28564 26.1427 2.28564 24.5713V7.42843C2.28564 5.857 3.53462 4.57129 5.06115 4.57129Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M30.0407 7.42773L16.1632 17.4277L2.28564 7.42773" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="contact-feature-text">
                                <h6>Email</h6>
                                <a href="mailto:contact@vcourse.net"><p>contact@vcourse.net</p></a>
                            </div>
                        </div>

                        <div class="contact-feature d-flex align-items-center">
                            <div class="contact-feature-icon success-bg">
                                <svg width="32" height="32" viewbox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M28.7992 22.3667V26.2205C28.8006 26.5783 28.7272 26.9324 28.5836 27.2602C28.44 27.588 28.2293 27.8823 27.9652 28.1242C27.701 28.366 27.3892 28.5502 27.0496 28.6648C26.71 28.7794 26.3502 28.822 25.9931 28.7898C22.0323 28.3602 18.2277 27.0095 14.8849 24.846C11.7749 22.8737 9.13821 20.2422 7.16198 17.1383C4.98665 13.7871 3.6329 9.9715 3.2104 6.00077C3.17823 5.64553 3.22053 5.2875 3.33461 4.94948C3.44869 4.61145 3.63204 4.30083 3.87299 4.0374C4.11394 3.77397 4.40721 3.56349 4.73413 3.41937C5.06105 3.27526 5.41446 3.20066 5.77185 3.20032H9.63333C10.258 3.19418 10.8636 3.41495 11.3372 3.82147C11.8109 4.22799 12.1202 4.79253 12.2077 5.40985C12.3706 6.64316 12.6729 7.85411 13.1087 9.01961C13.2818 9.4794 13.3193 9.9791 13.2167 10.4595C13.114 10.9399 12.8755 11.3809 12.5294 11.7301L10.8947 13.3616C12.7271 16.5777 15.3952 19.2405 18.6177 21.0693L20.2524 19.4378C20.6024 19.0924 21.0442 18.8544 21.5256 18.7519C22.0069 18.6495 22.5076 18.6869 22.9683 18.8597C24.1361 19.2946 25.3495 19.5963 26.5852 19.759C27.2105 19.847 27.7815 20.1613 28.1897 20.6421C28.5979 21.1229 28.8148 21.7367 28.7992 22.3667Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="contact-feature-text">
                                <h6>Phone</h6>
                                <p>+8801711-666603</p>
                            </div>
                        </div>
                        <img src="{{asset('images/frontimages/shape/dots/dots-img-03.png')}}" alt="Shape" class="img-fluid contact-feature-shape">
                    </div>
                    <div class="col-lg-7 form-area">
                        @include('frontend.inc.messages')
                        <form action="{{route('contacts.store')}}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control form-control--focused" placeholder="Type here..." id="name" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Type here..." id="email" required>
                                </div>
                            </div>
                            <div class="row my-lg-2 my-2">
                                <div class="col-12">
                                    <label for="phone">Phone</label>
                                    <input type="text" onkeypress='validate(event)' name="phone" id="phone" class="form-control" placeholder="Type here..." required>
                                </div>
                            </div>
                            <div class="row my-lg-2 my-2">
                                <div class="col-12">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Type here..." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="message">Messages</label>
                                    <textarea id="message" name="message" placeholder="Type here..." class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-end">
                                    <button type="submit" class="button button-lg button--primary fw-normal">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-area-shape">
                            <img src="{{asset('images/frontimages/shape/circle3.png')}}" alt="Shape" class="img-fluid shape-01">
                            <img src="{{asset('images/frontimages/shape/circle5.png')}}" alt="Shape" class="img-fluid shape-02">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Get in Touch Area Ends Here -->

        <!-- Map Area Starts Here -->
        <div class="map-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="map-area-frame">
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Home%20234,%20Phase-2,%20Road%2010,%20Sonadanga,%20Khulna,%20Bangladesh&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net">map embed</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map Area Ends Here -->

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

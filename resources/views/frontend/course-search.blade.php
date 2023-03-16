@extends('frontend.layouts.app')

@section('content')
        <!-- Breadcrumb Starts Here -->
        <div class=" d-none event-sub-section event-sub-section--spaceY eventsearch-sub-section">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html.htm" class="fs-6 text-secondary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="course-search.html.htm" class="fs-6 text-secondary">course</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb Ends Here -->

        <!-- Event Search Starts Here -->
        <section class="section event-search">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="event-search-bar shadow  mb-3 bg-body rounded">
                            <form action="{{route('courses.search')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-input-group">
                                    <input type="text" class="form-control" placeholder="Search Course..." name="search">
                                    <button class="button button-lg button--primary" type="submit" id="button-addon2">
                                        Search
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <form action="{{route('courses.search')}}" method="post">
                            @csrf
                            <div class="accordion sidebar-filter" id="sidebarFilter">
                                <!-- Category  -->
                                <div class="accordion-item">
                                    <h5>Category</h5>
                                    <div id="categoryCollapse" class="accordion-collapse collapse show" aria-labelledby="categoryAcc" data-bs-parent="#sidebarFilter">
                                        <div class="accordion-body">
                                                <div class="accordion-body__item">
                                                    <div class="check-box">
                                                        <input type="checkbox" class="checkbox-primary" value="1" name="allcategory">
                                                        <label> All </label>
                                                    </div>
                                                    <p class="check-details">
                                                        {{$courses->count()}}
                                                    </p>
                                                </div>
                                                @foreach ($categories as $category)
                                                <div class="accordion-body__item">
                                                    <div class="check-box">
                                                        <input type="checkbox" class="checkbox-primary" value ="{{$category->id}}" name="categories[]">
                                                        <label> {{$category->name}} </label>
                                                    </div>
                                                    <p class="check-details">
                                                        {{$category->courses->count()}}
                                                    </p>
                                                </div>
                                                @endforeach

                                        </div>
                                    </div>
                                </div>
                                <!-- Price  -->
                                <div class="">
                                    <h5 class="" id="">Price ({{$minPrice}} - {{$maxPrice}})</h5>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label >Minimum</label>
                                    <input class="w-90 ms-2" type="range" id="min-price" value="{{$minPrice}}" name="min_price" min="{{$minPrice}}" max="{{$maxPrice}}">&nbsp;<span id="min-value"></span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label >Maximum</label>
                                        <input class="w-90 ms-2" type="range" id="max-price" value="{{$maxPrice}}" name="max_price" min="{{$minPrice}}" max="{{$maxPrice}}">&nbsp;<span id="max-value"></span>
                                    </div>

                                </div>
                            </div>

                            <input type="submit" value="Filter" class="btn btn-primary w-100 mt-3">
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div class="d-none event-search-results">
                            <div class="event-search-results-heading">
                                <div class="nice-select" tabindex="0">
                                    <span class="current">Most Viewed</span>
                                    <ul class="list">
                                        <li data-value="Nothing" data-display="category" class="option selected focus">
                                            Nothing
                                        </li>
                                        <li data-value="1" class="option">Some option</li>
                                        <li data-value="2" class="option">Another option</li>
                                        <li data-value="4" class="option">Potato</li>
                                    </ul>
                                </div>
                                <p>1, 254 results found.</p>
                                <button class="button button-lg button--primary button--primary-filter d-lg-none" id="filter">
                                    <span>
                                        <svg width="19" height="16" viewbox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    Filter
                                </button>
                            </div>
                        </div>
                        <div class="row event-search-content">
                            @foreach ($courses as $course)
                                <div class="col-md-4 mb-4">
                                    @include('frontend.inc.course_showcase')
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="filter-sidebar">
            <div class="filter-sidebar__top">
                <button class="filter--cross">
                    <svg width="20" height="19" viewbox="0 0 20 19" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5967 4.59668L5.40429 13.7891" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M5.40332 4.59668L14.5957 13.7891" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <form action="#">
                <div class="filter-sidebar__wrapper">
                    <div class="accordion sidebar-filter" id="sidebarFilter">
                        <!-- Category  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="categoryAcc">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
                                    category
                                </button>
                            </h2>
                            <div id="categoryCollapse" class="accordion-collapse collapse show" aria-labelledby="categoryAcc" data-bs-parent="#sidebarFilter">
                                <div class="accordion-body">
                                    <form action="#">
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> All </label>
                                            </div>
                                            <p class="check-details">
                                                1,54,750
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Development </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Finance & Accounting </label>
                                            </div>
                                            <p class="check-details">
                                                35,790
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> IT & Software </label>
                                            </div>
                                            <p class="check-details">
                                                5,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Offices Productivity </label>
                                            </div>
                                            <p class="check-details">
                                                765
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Personal Development </label>
                                            </div>
                                            <p class="check-details">
                                                65
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Digatal Marketing </label>
                                            </div>
                                            <p class="check-details">
                                                9,870
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Health & Fitness </label>
                                            </div>
                                            <p class="check-details">
                                                70
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Level  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="levelAcc">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#levelCollapse" aria-expanded="false" aria-controls="levelCollapse">
                                    Level
                                </button>
                            </h2>
                            <div id="levelCollapse" class="accordion-collapse collapse" aria-labelledby="levelAcc" data-bs-parent="#sidebarFilter">
                                <div class="accordion-body">
                                    <form action="#">
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> All </label>
                                            </div>
                                            <p class="check-details">
                                                1,54,750
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Beginner </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Intermediate </label>
                                            </div>
                                            <p class="check-details">
                                                35,790
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Advanced </label>
                                            </div>
                                            <p class="check-details">
                                                5,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> Expert </label>
                                            </div>
                                            <p class="check-details">
                                                765
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Price  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Price
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#sidebarFilter">
                                <div class="accordion-body">
                                    <div class="price-range">
                                        <div>
                                            <div class="price-range-block">
                                                <form class="d-flex price-range-block__inputWrapper" action="#">
                                                    <input type="number" min="0" max="5000" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" style="width: 105px; height: 50px; border-radius: 4px; padding: 15px;">
                                                    <span>to</span>
                                                    <input type="number" min="0" max="5000" oninput="validity.valid||(value='5000');" id="max_price" class="price-range-field" style="width: 125px; height: 50px; padding: 15px; border-radius: 4px;">
                                                    <button class="angle-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <div id="slider-range" class="price-filter-range"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rating  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="ratingAcc">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ratingCollapse" aria-expanded="false" aria-controls="ratingCollapse">
                                    Rating
                                </button>
                            </h2>
                            <div id="ratingCollapse" class="accordion-collapse collapse" aria-labelledby="ratingAcc" data-bs-parent="#sidebarFilter">
                                <div class="accordion-body">
                                    <form action="#">
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> All </label>
                                            </div>
                                            <p class="check-details">
                                                1,54,750
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 1 Star and higher </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 2 Star and higher </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 3 Star and higher </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 4 Star and higher </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 5 Star </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Duration  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="durationAcc">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#durationCollapse" aria-expanded="false" aria-controls="durationCollapse">
                                    Duration
                                </button>
                            </h2>
                            <div id="durationCollapse" class="accordion-collapse collapse" aria-labelledby="durationAcc" data-bs-parent="#sidebarFilter">
                                <div class="accordion-body">
                                    <form action="#">
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> All </label>
                                            </div>
                                            <p class="check-details">
                                                1,54,750
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 0 - 5 minutes </label>
                                            </div>
                                            <p class="check-details">
                                                45,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 5 - 10 minutes </label>
                                            </div>
                                            <p class="check-details">
                                                35,790
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 10 - 15 minutes </label>
                                            </div>
                                            <p class="check-details">
                                                5,770
                                            </p>
                                        </div>
                                        <div class="accordion-body__item">
                                            <div class="check-box">
                                                <input type="checkbox" class="checkbox-primary">
                                                <label> 15+ minutes </label>
                                            </div>
                                            <p class="check-details">
                                                765
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <button class="button button-lg button--primary button--primary-filter w-100 d-lg-none" type="button">
                <span>
                    <svg width="19" height="16" viewbox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
                Apply
            </button>
        </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        let mii = $('#min-price'),
        mio = $('#min-value'),
        mai = $('#max-price'),
        mao = $('#max-value');

        mio.text(mii.val());
        mao.text(mai.val());



        mii.on('input',function(){
            mio.text(mii.val());
        });

        mai.on('input',function(){
            mao.text(mai.val());
        });

    });
</script>
@endsection

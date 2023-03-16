@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{auth()->user()->name}}</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{today()->toFormattedDateString()}}
                        </button>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            @role('admin')
            <p>Total</p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Sale Courses</p>
                            <p class="fs-30 mb-2">{{$totalSaleCourses}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Courses (Approved)</p>
                            <p class="fs-30 mb-2">{{$totalCourses}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                        <p class="mb-4">Total Students</p>
                        <p class="fs-30 mb-2">{{$totalStudent}}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tops --}}
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title mb-0">Top Courses</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Course</th>
                                <th>Price</th>
                                <th>students</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topCourses as $course)

                                @php
                                    $studentsNumber = Illuminate\Support\Facades\DB::table('enrollment_items')->where('course_id', $course->id)->groupBy('student_id')->count();
                                @endphp
                                <tr>
                                <td data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$course->name}}">{{ substr($course->name, 0, 10)}}</td>
                                <td class="font-weight-bold">&#2547;{{$course->price}}</td>
                                <td>{{$studentsNumber}}</td>
                                <td class="font-weight-medium"><div class="badge badge-success">{{$course->status}}</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title mb-0">Top Categories</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Category</th>
                                <th>Course QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topCategories as $category)
                                    @php
                                    $courseInCat = Illuminate\Support\Facades\DB::table('courses')->where('category_id', $category->id)->count();
                                    @endphp
                                <tr>
                                <td>{{$category->name}}</td>
                                <td class="font-weight-medium"><div class="badge badge-success">{{$courseInCat}}</div></td>
                                </tr>
                                @endforeach

                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>Monthly</p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">This Month Sale Ourses</p>
                            <p class="fs-30 mb-2">{{$thisMonthSaleCourses}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">This Month Courses</p>
                            <p class="fs-30 mb-2">{{$thisMonthCourses}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                        <p class="mb-4">This Month Students</p>
                        <p class="fs-30 mb-2">{{$thisMonthStudent}}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tops --}}
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title mb-0">Top Courses</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Course</th>
                                <th>Price</th>
                                <th>students</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thisMonthTopCourses as $course)

                                @php
                                    $studentsNumber = Illuminate\Support\Facades\DB::table('enrollment_items')->where('course_id', $course->id)->groupBy('student_id')->count();
                                @endphp
                                <tr>
                                <td data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$course->name}}">{{ substr($course->name, 0, 10)}}</td>
                                <td class="font-weight-bold">&#2547;{{$course->price}}</td>
                                <td>{{$studentsNumber}}</td>
                                <td class="font-weight-medium"><div class="badge badge-success">{{$course->status}}</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title mb-0">Top Categories</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Category</th>
                                <th>Course QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thisMonthTopCategories as $category)
                                    @php
                                    $courseInCat = Illuminate\Support\Facades\DB::table('courses')->where('category_id', $category->id)->count();
                                    @endphp
                                <tr>
                                <td>{{$category->name}}</td>
                                <td class="font-weight-medium"><div class="badge badge-success">{{$courseInCat}}</div></td>
                                </tr>
                                @endforeach

                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>Daily</p>
            <hr>
            <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Today Sale Ourses</p>
                            <p class="fs-30 mb-2">{{$todaySaleCourses}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Today Courses</p>
                            <p class="fs-30 mb-2">{{$todayCourses}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                        <p class="mb-4">Today Students</p>
                        <p class="fs-30 mb-2">{{$todayStudent}}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tops --}}
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title mb-0">Top Courses</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Course</th>
                                <th>Price</th>
                                <th>students</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todayTopCourses as $course)

                                @php
                                    $studentsNumber = Illuminate\Support\Facades\DB::table('enrollment_items')->where('course_id', $course->id)->groupBy('student_id')->count();
                                @endphp
                                <tr>
                                <td data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$course->name}}">{{ substr($course->name, 0, 10)}}</td>
                                <td class="font-weight-bold">&#2547;{{$course->price}}</td>
                                <td>{{$studentsNumber}}</td>
                                <td class="font-weight-medium"><div class="badge badge-success">{{$course->status}}</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <p class="card-title mb-0">Top Categories</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                <th>Category</th>
                                <th>Course QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todyTopCategories as $category)
                                    @php
                                    $courseInCat = Illuminate\Support\Facades\DB::table('courses')->where('category_id', $category->id)->count();
                                    @endphp
                                <tr>
                                <td>{{$category->name}}</td>
                                <td class="font-weight-medium"><div class="badge badge-success">{{$courseInCat}}</div></td>
                                </tr>
                                @endforeach

                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
        </div>
        <!-- content-wrapper ends -->
        @include('inc.footer')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection

@section('script')
    <script>
    </script>
@endsection


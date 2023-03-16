@extends('layouts.app')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        @include('inc.themeSetting')

        @include('inc.sidebarLeft')

        <!-- partial -->
        <div class="main-panel">            <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All Instructors</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="coursetable" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>Sirial</th>
                                            <th>Name</th>
                                            <th>Courses</th>
                                            <th>Certifications</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                            <th>Updated at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                            </tr>
                                            <tr>
                                                <td>Row 1 Data 1</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                                <td>Row 1 Data 2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#coursetable').DataTable();
            // $('#table_id').DataTable();
        } );
    </script>
@endsection


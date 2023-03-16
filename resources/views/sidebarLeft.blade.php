
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">
                <i class="icon-eye menu-icon"></i>
                <span class="menu-title">Frontend</span>
                </a>
            </li>
            @auth


            <li class="nav-item">
                <a class="nav-link" href="{{url('dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#cources" aria-expanded="false" aria-controls="cources">
                    <i class="ti-bookmark-alt menu-icon"></i>
                    <span class="menu-title">Cources</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="cources">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('courses.index')}}"> All </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{url('courses/create')}}">Create</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('lessons.create') }}"> Add lesson </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('batches') }}"> Batches </a></li>
                        @role('admin')
                        <li class="nav-item"> <a class="nav-link" href="{{url('courses/pending')}}">Pending Course</a></li>
                        @endrole

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('categories')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Categories</span>
                </a>
            </li>
            @role('admin')
            <li class="nav-item">
                <a class="nav-link"  href="{{url('users')}}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Users</span>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('permissions')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('roles')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('subscriptions')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Subscriptions</span>
                </a>
            </li>
            @endrole

            @endauth
            </ul>
        </nav>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','admin shariatpur technical school and collage')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/parsley.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/parsley.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow" style="border-bottom: 1px dotted #ff8b33;">
            <div class="container-fluid">
                <a class="navbar-brand text-info" href="{{ url('/home') }}">
                   Stsc Admin
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::user())
                            <li class="nav-item">
                              <a href="{{ route('backend_teacher_manage') }}" class="nav-link text-white">Teacher</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend_student_manage') }}" class="nav-link text-white">Student</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend_department_manage') }}" class="nav-link text-white">Department</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend_class_manage') }}" class="nav-link text-white">Classes</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link text-white">Notifications</a>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3 pt-4 pre-scrollable min-vh-100">
                    @if(Auth::check())
                    <div class="accordion navbar-light shadow" id="accordionExample">

                        <div class="card">
                            <div class="card-header bg-secondary" id="headingOne">
                                    <button class="btn font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       Students
                                    </button>
                                <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></i>
                            </div>
                            <div id="collapseOne" class="collapse
                                                        {{ route::is('backend_student_manage') ? 'show' : '' }}
                                                        {{ route::is('backend_student_create') ? 'show' : '' }}
                                                        " aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <a href="{{ route('backend_student_manage') }}" class="nav-link {{ route::is('backend_student_manage') ? 'text-success font-weight-bold' : '' }} ">Manage student</a>
                                    <a href="{{ route('backend_student_create') }}" class="nav-link {{ route::is('backend_student_create') ? 'text-success font-weight-bold' : '' }} ">Add student</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-secondary" id="headingTwo">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Teachers
                                    </button>
                                <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"></i>
                            </div>
                            <div id="collapseTwo" class="collapse
                                                        {{ route::is('backend_teacher_manage') ? 'show' : '' }}
                                                        {{ route::is('backend_teacher_create') ? 'show' : '' }}
                                                        " aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <a href="{{ route('backend_teacher_manage') }} " class="nav-link {{ route::is('backend_teacher_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Teachers</a>
                                    <a href="{{ route('backend_teacher_create') }} " class="nav-link {{ route::is('backend_teacher_create') ? 'text-success font-weight-bold' : '' }} ">Add Teachers</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-secondary" id="headingThree">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Departments
                                    </button>
                                <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"></i>
                            </div>
                            <div id="collapseThree" class="collapse
                                                          {{ route::is('backend_department_manage') ? 'show' : '' }}
                                                          {{ route::is('backend_department_create') ? 'show' : '' }}
                                                          " aria-labelledby="headingThree" data-parent="#accordionExample">
                                <a href="{{ route('backend_department_manage') }} " class="nav-link {{ route::is('backend_department_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Departments</a>
                                <a href="{{ route('backend_department_create') }} " class="nav-link {{ route::is('backend_department_create') ? 'text-success font-weight-bold' : '' }} ">Add Depertments</a>
                            </div>
                        </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingfour">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        Classes
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour"></i>
                                </div>
                                <div id="collapsefour" class="collapse
                                                             {{ route::is('backend_class_manage') ? 'show' : '' }}
                                                             {{ route::is('backend_class_create') ? 'show' : '' }}
                                                             " aria-labelledby="headingfour" data-parent="#accordionExample">
                                    <a href="{{ route('backend_class_manage') }}" class="nav-link {{ route::is('backend_class_manage') ? 'text-success font-weight-bold' : '' }} ">Manage classes</a>
                                    <a href="{{ route('backend_class_create') }}" class="nav-link {{ route::is('backend_class_create') ? 'text-success font-weight-bold' : '' }} ">Add classes</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingfive">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                        Results
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive"></i>
                                </div>
                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
                                    <a href="" class="nav-link">Manage Results</a>
                                    <a href="" class="nav-link">Add Results</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingsix">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                        Notices
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix"></i>
                                </div>
                                <div id="collapsesix" class="collapse
                                                            {{ route::is('backend_notice_manage') ? 'show' : '' }}
                                                            {{ route::is('backend_notice_create') ? 'show' : '' }}
                                                            " aria-labelledby="headingsix" data-parent="#accordionExample">
                                    <a href="{{ route('backend_notice_manage') }}" class="nav-link {{ route::is('backend_notice_manage') ? 'text-success font-weight-bold' : '' }}">Manage Notices</a>
                                    <a href="{{ route('backend_notice_create') }}" class="nav-link {{ route::is('backend_notice_create') ? 'text-success font-weight-bold' : '' }}">Add Notices</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingseven">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                        Accounts
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven"></i>
                                </div>
                                <div id="collapseseven" class="collapse
                                                              {{ route::is('backend_account_manage') ? 'show' : '' }}
                                                              {{ route::is('backend_account_create') ? 'show' : '' }}
                                                              " aria-labelledby="headingseven" data-parent="#accordionExample">
                                    <a href="{{ route('backend_account_manage') }} " class="nav-link {{ route::is('backend_account_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Accounts</a>
                                    <a href="{{ route('backend_account_create') }} " class="nav-link {{ route::is('backend_account_create') ? 'text-success font-weight-bold' : '' }} ">Add Accounts</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingeight">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseight" aria-expanded="false" aria-controls="collapseight">
                                        Livarys
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseight" aria-expanded="false" aria-controls="collapseight"></i>
                                </div>
                                <div id="collapseight" class="collapse
                                                            {{ route::is('backend_libary_manage') ? 'show' : '' }}
                                                            {{ route::is('backend_libary_create') ? 'show' : '' }}
                                                             " aria-labelledby="headingeight" data-parent="#accordionExample">
                                    <a href="{{ route('backend_libary_manage') }}" class="nav-link {{ route::is('backend_libary_manage') ? 'text-success font-weight-bold' : '' }}">Manage Libarys</a>
                                    <a href="{{ route('backend_libary_create') }}" class="nav-link {{ route::is('backend_libary_create') ? 'text-success font-weight-bold' : '' }}">Add Libarys</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingnine">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                        Programs
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine"></i>
                                </div>
                                <div id="collapsenine" class="collapse
                                                             {{ route::is('backend_program_manage') ? 'show' : '' }}
                                                             {{ route::is('backend_program_create') ? 'show' : '' }}
                                                             " aria-labelledby="headingnine" data-parent="#accordionExample">
                                    <a href="{{ route('backend_program_manage') }} " class="nav-link {{ route::is('backend_program_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Programs</a>
                                    <a href="{{ route('backend_program_create') }} " class="nav-link {{ route::is('backend_program_create') ? 'text-success font-weight-bold' : '' }} ">Add Programs</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingten">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                        Magazines
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten"></i>
                                </div>
                                <div id="collapseten" class="collapse
                                                            {{ route::is('backend_magazine_manage') ? 'show' : '' }}
                                                            {{ route::is('backend_magazine_create') ? 'show' : '' }}
                                                            " aria-labelledby="headingten" data-parent="#accordionExample">
                                    <a href="{{ route('backend_magazine_manage') }} " class="nav-link {{ route::is('backend_magazine_manage') ? 'text-success font-weight-bold' : '' }} ">Manage magazines</a>
                                    <a href="{{ route('backend_magazine_create') }} " class="nav-link {{ route::is('backend_magazine_create') ? 'text-success font-weight-bold' : '' }} ">Add Magazines</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingeleven">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                                        Gardens
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven"></i>
                                </div>
                                <div id="collapseeleven" class="collapse
                                                               {{ route::is('backend_garden_manage') ? 'show' : '' }}
                                                               {{ route::is('backend_garden_create') ? 'show' : '' }}
                                                               " aria-labelledby="headingeleven" data-parent="#accordionExample">
                                    <a href="{{ route('backend_garden_manage') }} " class="nav-link {{ route::is('backend_garden_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Gardens</a>
                                    <a href="{{ route('backend_garden_create') }}" class="nav-link {{ route::is('backend_garden_create') ? 'text-success font-weight-bold' : '' }} ">Add Gardens</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingtwelve">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                                        Pools
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve"></i>
                                </div>
                                <div id="collapsetwelve" class="collapse
                                                               {{ route::is('backend_pool_manage') ? 'show' : '' }}
                                                               {{ route::is('backend_pool_create') ? 'show' : '' }}
                                                               " aria-labelledby="headingtwelve" data-parent="#accordionExample">
                                    <a href="{{ route('backend_pool_manage') }} " class="nav-link {{ route::is('backend_pool_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Pools</a>
                                    <a href="{{ route('backend_pool_create') }} " class="nav-link {{ route::is('backend_pool_create') ? 'text-success font-weight-bold' : '' }} ">Add Pools</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingthirteen">
                                    <button class="btn font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsethirteen" aria-expanded="true" aria-controls="collapsethirteen">
                                        Labs
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsethirteen" aria-expanded="false" aria-controls="collapsethirteen"></i>
                                </div>
                                <div id="collapsethirteen" class="collapse
                                                                {{ route::is('backend_lab_manage') ? 'show' : '' }}
                                                                {{ route::is('backend_lab_create') ? 'show' : '' }}
                                                                 " aria-labelledby="headingthirteen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_lab_manage') }} " class="nav-link {{ route::is('backend_lab_manage') ? 'text-success font-weight-bold' : '' }} ">Manage labs</a>
                                    <a href="{{ route('backend_lab_create') }} " class="nav-link {{ route::is('backend_lab_create') ? 'text-success font-weight-bold' : '' }} ">Add Labs</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingfourteen">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsefourteen" aria-expanded="false" aria-controls="collapsefourteen">
                                        Driving Students
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsefourteen" aria-expanded="false" aria-controls="collapsefourteen"></i>
                                </div>
                                <div id="collapsefourteen" class="collapse
                                                                {{ route::is('backend_driving_student_manage') ? 'show' : '' }}
                                                                {{ route::is('backend_driving_student_create') ? 'show' : '' }}
                                                                 " aria-labelledby="headingfourteen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_driving_student_manage') }}" class="nav-link {{ route::is('backend_driving_student_manage') ? 'text-success font-weight-bold' : '' }}">Manage Driving Students</a>
                                    <a href="{{ route('backend_driving_student_create') }}" class="nav-link {{ route::is('backend_driving_student_create') ? 'text-success font-weight-bold' : '' }}">Add Driving Students</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingfifteen">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsefifteen" aria-expanded="false" aria-controls="collapsefifteen">
                                        Driving Teachers
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsefifteen" aria-expanded="false" aria-controls="collapsefifteen"></i>
                                </div>
                                <div id="collapsefifteen" class="collapse
                                                                {{ route::is('backend_driving_teacher_manage') ? 'show' : '' }}
                                                                {{ route::is('backend_driving_teacher_create') ? 'show' : '' }}
                                                                " aria-labelledby="headingfifteen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_driving_teacher_manage') }} " class="nav-link {{ route::is('backend_driving_teacher_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Driving Teachers</a>
                                    <a href="{{ route('backend_driving_teacher_create') }} " class="nav-link {{ route::is('backend_driving_teacher_create') ? 'text-success font-weight-bold' : '' }} ">Add Driving Teachers</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingsixteen">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsesixteen" aria-expanded="false" aria-controls="collapsesixteen">
                                        buildings
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsesixteen" aria-expanded="false" aria-controls="collapsesixteen"></i>
                                </div>
                                <div id="collapsesixteen" class="collapse
                                                                {{ route::is('backend_buliding_manage') ? 'show' : '' }}
                                                                {{ route::is('backend_building_create') ? 'show' : '' }}
                                                                " aria-labelledby="headingsixteen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_building_manage') }} " class="nav-link {{ route::is('backend_building_manage') ? 'text-success font-weight-bold' : '' }} ">Manage buildings</a>
                                    <a href="{{ route('backend_building_create') }} " class="nav-link {{ route::is('backend_building_create') ? 'text-success font-weight-bold' : '' }} ">Add buildings</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingseventeen">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseseventeen" aria-expanded="false" aria-controls="collapseseventeen">
                                        Rooms
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseseventeen" aria-expanded="false" aria-controls="collapseseventeen"></i>
                                </div>
                                <div id="collapseseventeen" class="collapse
                                                                  {{ route::is('backend_room_manage') ? 'show' : '' }}
                                                                  {{ route::is('backend_room_create') ? 'show' : '' }}
                                                                  " aria-labelledby="headingseventeen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_room_manage') }} " class="nav-link {{ route::is('backend_room_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Rooms</a>
                                    <a href="{{ route('backend_room_create') }} " class="nav-link {{ route::is('backend_room_create') ? 'text-success font-weight-bold' : '' }} ">Add Rooms</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingeighteen">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapseeighteen" aria-expanded="false" aria-controls="collapseeighteen">
                                        Driving Course
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapseeighteen" aria-expanded="false" aria-controls="collapseeighteen"></i>
                                </div>
                                <div id="collapseeighteen" class="collapse
                                                                 {{ route::is('backend_driving_course_manage') ? 'show' : '' }}
                                                                 {{ route::is('backend_driving_course_create') ? 'show' : '' }}
                                                                 " aria-labelledby="headingeighteen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_driving_course_manage') }} " class="nav-link {{ route::is('backend_driving_course_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Driving Course</a>
                                    <a href="{{ route('backend_driving_course_create') }} " class="nav-link {{ route::is('backend_driving_course_create') ? 'text-success font-weight-bold' : '' }} ">Add Driving Course</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingnineteen">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsenineteen" aria-expanded="false" aria-controls="collapsenineteen">
                                        Books
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsenineteen" aria-expanded="false" aria-controls="collapsenineteen"></i>
                                </div>
                                <div id="collapsenineteen" class="collapse
                                                                {{ route::is('backend_book_manage') ? 'show' : '' }}
                                                                {{ route::is('backend_book_create') ? 'show' : '' }}
                                                                 " aria-labelledby="headingnineteen" data-parent="#accordionExample">
                                    <a href="{{ route('backend_book_manage') }} " class="nav-link {{ route::is('backend_book_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Books</a>
                                    <a href="{{ route('backend_book_create') }} " class="nav-link {{ route::is('backend_book_create') ? 'text-success font-weight-bold' : '' }} ">Add Books</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingtwenty">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsetwenty" aria-expanded="false" aria-controls="collapsetwenty">
                                        Photos
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsetwenty" aria-expanded="false" aria-controls="collapsetwenty"></i>
                                </div>
                                <div id="collapsetwenty" class="collapse
                                                                {{ route::is('backend_photo_manage') ? 'show' : '' }}
                                                                {{ route::is('backend_photo_create') ? 'show' : '' }}
                                                               " aria-labelledby="headingtwenty" data-parent="#accordionExample">
                                    <a href="{{ route('backend_photo_manage') }} " class="nav-link {{ route::is('backend_photo_manage') ? 'text-success font-weight-bold' : '' }}">Manage Photos</a>
                                    <a href="{{ route('backend_photo_create') }} " class="nav-link {{ route::is('backend_photo_create') ? 'text-success font-weight-bold' : '' }}">Add Photos</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingtwentyone">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsetwentyone" aria-expanded="false" aria-controls="collapsetwentyone">
                                        Videos
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsetwentyone" aria-expanded="false" aria-controls="collapsetwentyone"></i>
                                </div>
                                <div id="collapsetwentyone" class="collapse
                                                                    {{ route::is('backend_video_manage') ? 'show' : '' }}
                                                                    {{ route::is('backend_video_create') ? 'show' : '' }}
                                                                  " aria-labelledby="headingtwentyone" data-parent="#accordionExample">
                                    <a href="{{ route('backend_video_manage') }}" class="nav-link {{ route::is('backend_video_manage') ? 'text-success font-weight-bold' : '' }}">Manage Videos</a>
                                    <a href="{{ route('backend_video_create') }}" class="nav-link {{ route::is('backend_video_create') ? 'text-success font-weight-bold' : '' }}">Add Videos</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingtwentytwo">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsetwentytwo" aria-expanded="false" aria-controls="collapsetwentytwo">
                                        Book Categorys
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsetwentytwo" aria-expanded="false" aria-controls="collapsetwentytwo"></i>
                                </div>
                                <div id="collapsetwentytwo" class="collapse
                                                                  {{ route::is('backend_book_category_manage') ? 'show' : '' }}
                                                                  {{ route::is('backend_book_category_create') ? 'show' : '' }}
                                                                  " aria-labelledby="headingtwentytwo" data-parent="#accordionExample">
                                    <a href="{{ route('backend_book_category_manage') }}" class="nav-link {{ route::is('backend_book_category_manage') ? 'text-success font-weight-bold' : '' }}">Manage Book Categorys</a>
                                    <a href="{{ route('backend_book_category_create') }}" class="nav-link {{ route::is('backend_book_category_create') ? 'text-success font-weight-bold' : '' }}">Add Book Categorys</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingtwentythree">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsetwentythree" aria-expanded="false" aria-controls="collapsetwentythree">
                                        Hostels
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsetwentythree" aria-expanded="false" aria-controls="collapsetwentythree"></i>
                                </div>
                                <div id="collapsetwentythree" class="collapse
                                                                    {{ route::is('backend_hostel_manage') ? 'show' : '' }}
                                                                    {{ route::is('backend_hostel_create') ? 'show' : '' }}
                                                                    " aria-labelledby="headingtwentythree" data-parent="#accordionExample">
                                    <a href="{{ route('backend_hostel_manage') }} " class="nav-link {{ route::is('backend_hostel_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Hostels</a>
                                    <a href="{{ route('backend_hostel_create') }} " class="nav-link {{ route::is('backend_hostel_create') ? 'text-success font-weight-bold' : '' }}">Add Hostels</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-secondary" id="headingtwentyfour">
                                    <button class="btn collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapsetwentyfour" aria-expanded="false" aria-controls="collapsetwentyfour">
                                        Gests
                                    </button>
                                    <i class="fa fa-arrow-right" style="color: white; float: right; margin-top: 11px; cursor: pointer;"  data-toggle="collapse" data-target="#collapsetwentyfour" aria-expanded="false" aria-controls="collapsetwentyfour"></i>
                                </div>
                                <div id="collapsetwentyfour" class="collapse
                                                                   {{ route::is('backend_gest_manage') ? 'show' : '' }}
                                                                   {{ route::is('backend_gest_create') ? 'show' : '' }}
                                                                   " aria-labelledby="headingtwentyfour" data-parent="#accordionExample">
                                    <a href="{{ route('backend_gest_manage') }} " class="nav-link {{ route::is('backend_gest_manage') ? 'text-success font-weight-bold' : '' }} ">Manage Gests</a>
                                    <a href="{{ route('backend_gest_create') }} " class="nav-link {{ route::is('backend_gest_create') ? 'text-success font-weight-bold' : '' }} ">Add gests</a>
                                </div>
                            </div>

                </div>
                    @endif
                </div>

                <div class="col-md-9">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/datatables.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $('#classTable').dataTable();
        $('#department_table').dataTable();
        $('#gardenTable').dataTable();
        $('#poolTable').dataTable();
        $('#labTable').dataTable();
        $('#magazineTable').dataTable();
        $('#programTable').dataTable();
        $('#accountTable').dataTable();
        $('#gestTable').dataTable();
        $('#driving_courseTable').dataTable();
        $('#buildingTable').dataTable();
        $('#libaryTable').dataTable();
        $('#hostelTable').dataTable();
        $('#book_categoryTable').dataTable();
        $('#roomTable').dataTable();
        $('#bookTable').dataTable();
        $('#noticeTable').dataTable();
        $('#photoTable').dataTable();
        $('#videoTable').dataTable();
        $('#teacherTable').dataTable();
        $('#driving_studentTable').dataTable();
        $('#studentTable').dataTable();
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>
</html>

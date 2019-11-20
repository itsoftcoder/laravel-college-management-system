<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Shariatpur Technical School and Collage')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{--  styles here--}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    {{-- script here--}}
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid">
    <div class="container-fluid shadow-sm" style="background: rgba(4,91,98,1)">
        <div class="">
            <div class="d-flex justify-content-between align-content-between">
                <img src="../icons/logo.jpg" class="rounded-circle" style="width: 80px;height: 60px;">
                <h4>what is the problem and collage</h4>
           </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{('../images/collage.jpg')}}" class="d-block w-100 shadow" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('../images/collage_2.jpg')}}" class="d-block w-100 shadow-sm" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('../images/collage_3.jpg')}}" class="d-block w-100 shadow-sm" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('../images/collage_4.jpg')}}" class="d-block w-100 shadow-sm" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('../images/collage_5.jpg')}}" class="d-block w-100 shadow-sm" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                    <div class="carousel-item">
                        <img src="{{('../images/collage_1.jpg')}}" class="d-block w-100 shadow-sm" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                    <div class="carousel-item shadow-sm">
                        <img src="{{('../images/collage_6.jpg')}}" class="d-block w-100 shadow-sm" style="height: 300px" title="shariatpur technical school and collage"/>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>



        {{-- here is a navigation bar--}}
        <div class="row sticky-top">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded" style="background: linear-gradient(#bbbbbb,#EED3D7,coral)">
                    <a class="navbar-brand text-white" href="{{ route('welcome') }}">Stsc</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                <a class="nav-link text-dark font-weight-bold {{ route::is('welcome') ? 'text-white bg-secondary active' : '' }} " href="{{ route('welcome') }}"> <img src="../icons/home.png" class="rounded-circle" style="width:20px;height:10px;" /> Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark font-weight-bold dropdown-toggle
                                   {{ route::is('frontend_student_diploma_8th') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_7th') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_6th') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_5th') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_4th') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_3rd') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_2nd') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_diploma_1st') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_xii') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_xi') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_x') ? 'text-white bg-secondary' : '' }}
                                   {{ route::is('frontend_student_ix') ? 'text-white bg-secondary' : '' }}"
                                   href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="../icons/student.png" class="rounded-circle" style="width:20px;height:10px;" />
                                    Student
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ route::is('frontend_student_ix') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_ix') }}">Class ix Student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_x') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_x') }}">Class x Student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_xi') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_xi') }}">Class xi Student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_xii') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_xii') }} ">Class xii Student</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_8th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_8th') }}">diploma 8th Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_7th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_7th') }}">diploma 7th Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_6th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_6th') }}">diploma 6th Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_5th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_5th') }}">diploma 5th Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_4th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_4th') }}">diploma 4th Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_3rd') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_3rd') }}">diploma 3rd Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_2nd') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_2nd') }}">diploma 2nd Semester student</a>
                                    <a class="dropdown-item {{ route::is('frontend_student_diploma_1st') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_1st') }}" >diploma 1st Semester student</a>
                                </div>
                            </li>
                            <li class="nav-item list-inline-item">
                                <a href="{{ route('frontend_teachers') }}" class="nav-link text-dark font-weight-bold {{ route::is('frontend_teachers') ? 'text-white bg-secondary active' : '' }} "><img src="../icons/teacher.png" class="rounded-circle" style="width:20px;height:15px;" /> Teachers</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark font-weight-bold dropdown-toggle
                                         {{ route::is('frontend_computer_department') ? 'text-white bg-secondary' : '' }}
                                         {{ route::is('frontend_electrical_department') ? 'text-white bg-secondary' : '' }}
                                         {{ route::is('frontend_electronic_department') ? 'text-white bg-secondary' : '' }}
                                         {{ route::is('frontend_fish_culture_department') ? 'text-white bg-secondary' : '' }}
                                         " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="../icons/department.png" class="rounded-circle" style="width:20px;height:15px;" />
                                    Departments
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ route::is('frontend_computer_department') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_computer_department') }} ">Computer</a>
                                    <a class="dropdown-item {{ route::is('frontend_electrical_department') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_electrical_department') }}">Electrical</a>
                                    <a class="dropdown-item {{ route::is('frontend_electronic_department') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_electronic_department') }}">Electronic</a>
                                    <a class="dropdown-item {{ route::is('frontend_fish_culture_department') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_fish_culture_department') }}">Fish Culture</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark font-weight-bold dropdown-toggle
                                          {{ route::is('frontend_class_ix') ? 'text-white bg-secondary' : '' }}
                                          {{ route::is('frontend_class_x') ? 'text-white bg-secondary' : '' }}
                                          {{ route::is('frontend_class_xi') ? 'text-white bg-secondary' : '' }}
                                          {{ route::is('frontend_class_xii') ? 'text-white bg-secondary' : '' }}
                                          {{ route::is('frontend_class_diploma') ? 'text-white bg-secondary' : '' }}
                                         " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="../icons/class.png" class="rounded-circle" style="width:20px;height:15px;" />
                                    Classes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ route::is('frontend_class_ix') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_class_ix') }}">class ix</a>
                                    <a class="dropdown-item {{ route::is('frontend_class_x') ? 'text-white bg-secondary' : '' }}" href="{{ route('frontend_class_x') }}">class x</a>
                                    <a class="dropdown-item {{ route::is('frontend_class_xi') ? 'text-white bg-secondary' : '' }}" href="{{ route('frontend_class_xi') }}">class xi</a>
                                    <a class="dropdown-item {{ route::is('frontend_class_xii') ? 'text-white bg-secondary' : '' }}" href="{{ route('frontend_class_xii') }}">class xii</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item {{ route::is('frontend_class_diploma') ? 'text-white bg-secondary' : '' }}" href="{{ route('frontend_class_diploma') }}">Diploma in Engineering</a>
                                </div>
                            </li>
                            <li class="nav-item list-inline-item">
                                <a href="{{ route('frontend_accounts') }}" class="nav-link text-dark font-weight-bold {{ route::is('frontend_accounts') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/account.png" class="rounded-circle" style="width:20px;height:15px;" /> Accounts</a>
                            </li>

                            <li class="nav-item list-inline-item">
                                <a href="{{ route('frontend_liberys') }}" class="nav-link text-dark font-weight-bold {{ route::is('frontend_liberys') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/libary.png" class="rounded-circle" style="width:20px;height:15px;" />  Libary</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark font-weight-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <img src="../icons/result.png" class="rounded-circle" style="width:20px;height:15px;" />  Results
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">class ix</a>
                                    <a class="dropdown-item" href="#">class x</a>
                                    <a class="dropdown-item" href="#">class xi</a>
                                    <a class="dropdown-item" href="#">class xii</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">diploma 8th semester</a>
                                    <a class="dropdown-item" href="#">diploma 7th Semester</a>
                                    <a class="dropdown-item" href="#">diploma 6th Semester</a>
                                    <a class="dropdown-item" href="#">diploma 5th Semester</a>
                                    <a class="dropdown-item" href="#">diploma 4th Semester</a>
                                    <a class="dropdown-item" href="#">diploma 3rd Semester</a>
                                    <a class="dropdown-item" href="#">diploma 2nd Semester</a>
                                    <a class="dropdown-item" href="#">diploma 1st Semester</a>

                                </div>
                            </li>

                            <li class="nav-item list-inline-item">
                                <a href="{{ route('frontend_notices') }}" class="nav-link text-dark font-weight-bold  {{ route::is('frontend_notices') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/notice.png" class="rounded-circle" style="width:20px;height:10px;" /> Notice</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-md-9">
                <div class="breadcrumb" style="background: linear-gradient(#f1a899,#ffcebd,#ff95dc)">
                @yield('breadcrumb')
                </div>
            </div>

            <div class="col-md-3">
                <form action="" method="post">
                    <div class="form-group"  >
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Search" name="search" autocomplete="search" autofocus required style="background: linear-gradient(#f1a899,#fafafa,#EED3D7)">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-sm btn-success" VALUE="GO!" style="background: linear-gradient(#f1a899,#ff8b33,#EED3D7)">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            {{--  this is leftbar--}}
            <div class="col-md-3">
                <ul class="list-group">
                    <li style="background: linear-gradient(#f1a899,#EED3D7,coral)" class="list-group-item list-group-item-action {{ route::is('welcome') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('welcome') }}" class="text-dark font-weight-bold">Shariatpur tsc</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_buildings') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_buildings') }}" class="d-block"> <img src="../icons/building.png" class="rounded-circle" style="width:20px;height:15px;" /> Buildings</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_hostels') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_hostels') }}" class="d-block"> <img src="../icons/hostel.png" class="rounded-circle" style="width:20px;height:15px;" /> Hostel</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_drivings') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_drivings') }}" class="d-block"><img src="../icons/driving.png" class="rounded-circle" style="width:20px;height:15px;" /> Driving</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_gests') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_gests') }}" class="d-block"> <img src="../icons/images.png" class="rounded-circle" style="width:20px;height:15px;" /> Gests</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_programs') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_programs') }}" class="d-block"> <img src="../icons/program.png" class="rounded-circle" style="width:20px;height:15px;" /> Programs</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_magazines') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_magazines') }}" class="d-block"> <img src="../icons/magazine.png" class="rounded-circle" style="width:20px;height:15px;" />   Magazine</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_labs') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_labs') }}" class="d-block"> <img src="../icons/labs.png" class="rounded-circle" style="width:20px;height:15px;" /> Labs</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_gardens') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_gardens') }}" class="d-block"> <img src="../icons/garden.png" class="rounded-circle" style="width:20px;height:15px;" />  Gardens</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_pools') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_pools') }}" class="d-block"> <img src="../icons/pools.png" class="rounded-circle" style="width:20px;height:15px;" />  Pools</a></li>
                    <li class="list-group-item list-group-item-action {{ route::is('frontend_mosques') ? 'text-white bg-secondary active' : '' }} "><a href="{{ route('frontend_mosques') }}" class="d-block"> <img src="../icons/mosque.png" class="rounded-circle" style="width:20px;height:15px;" />  Mosque</a></li>
                    <li class="list-group-item list-group-item-action"><a href="#" class=""><img src="../icons/admission_going.png" style="height:15px;width:20px;" class="rounded-circle" />  Admission Going</a></li>
                    <li class="list-group-item list-group-item-action"><a href="#" class=""><img src="../icons/admission.png" class="rounded-cricle" style="height:15px;width:20px;" />   Admission Result</a></li>
                    <li class="list-group-item list-group-item-action"><a href="#" class=""><img src="../icons/about.png" class="rounded-cricle" style="height:15px;width:20px;"/>  About us</a></li>
                    <li class="list-group-item list-group-item-action"><a href="#" class=""><img src="../icons/contact.png" class="rounded-cricle" style="height:15px;width:20px;" />   Contact us</a></li>
                    <li class="list-group-item list-group-item-action
                              {{ route::is('frontend_books') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_author_book_show') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_publication_book_show') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_class_book_show') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_book_category_book_show') ? 'text-white bg-secondary active' : '' }}
                        ">
                        <a href="{{ route('frontend_books') }}" class="d-block"> <img src="../icons/books.png" class="rounded-circle" style="width:20px;height:15px;" />  Books</a>
                    </li>
                    <li class="list-group-item list-group-item-action
                              {{ route::is('frontend_photos') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_photo_lab') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_photo_garden') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_photo_magazine') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_photo_program') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_photo_pool') ? 'text-white bg-secondary active' : '' }}
                        ">
                        <a href="{{ route('frontend_photos') }}" class="d-block"> <img src="../icons/photo.png" class="rounded-cricle" style="width:20px;height:15px;"/>  Photo gallary</a>
                    </li>
                    <li class="list-group-item list-group-item-action
                               {{ route::is('frontend_videos') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_video_lab') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_video_garden') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_video_magazine') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_video_program') ? 'text-white bg-secondary active' : '' }}
                    {{ route::is('frontend_video_pool') ? 'text-white bg-secondary active' : '' }}
                        ">
                        <a href="{{ route('frontend_videos') }}" class="d-block"> <img src="../icons/videos.png" class="rounded-circle" style="width:20px;height:15px;" />  Videos</a>
                    </li>
                    <li class="list-group-item list-group-item-action"><a href="#" class=""><img src="../icons/others.png" class="rounded-circle" style="width:20px;height:15px;" />  Others</a></li>

                </ul>
            </div>

            <div class="col-md-9">
                @yield('content')
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                @yield('onther_content')
            </div>
        </div>

        <div class="row p-2 bg-white">
            <div class="col-md-3">
                <ul class="nav">
                    <li class="nav-item"><a href="{{ route('frontend_privacys') }}" class="nav-link font-weight-bold {{ route::is('frontend_privacys') ? 'text-white bg-secondary active' : '' }} "><img src="../icons/privacy.png" class="rounded-circle" style="width:20px;height:15px;" />  Privacy</a></li>
                    <li class="nav-item"><a href="{{ route('frontend_services') }}" class="nav-link font-weight-bold {{ route::is('frontend_services') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/service.png" class="rounded-circle" style="width:20px;height:15px;" />  Services</a></li>
                </ul>
                <ul class="nav">
                    <li class="nav-item"><a href="{{ route('frontend_developers') }}" class="nav-link font-weight-bold {{ route::is('frontend_developers') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/developer.png" class="rounded-circle" style="width:20px;height:15px;" />  Developer</a></li>
                    <li class="nav-item"><a href="{{ route('frontend_helps') }}" class="nav-link font-weight-bold {{ route::is('frontend_helps') ? 'text-white bg-secondary active' : '' }} ">  <img src="../icons/helps.png" class="rounded-circle" style="width:20px;height:15px;" /> Helps</a></li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <h5 class="font-weight-bold text-info mt-2">Shariatpur Technical School and Collage</h5>
                <p class="text-success">@copy right alamin hossain 2019</p>
            </div>
            <div class="col-md-3">
                <ul class="nav">
                    <li class="nav-item"><a href="{{ route('frontend_developers') }}" class="nav-link font-weight-bold {{ route::is('frontend_developers') ? 'text-white bg-secondary active' : '' }} ">  <img src="../icons/developer.png" class="rounded-circle" style="width:20px;height:15px;" /> Developer</a></li>
                    <li class="nav-item"><a href="{{ route('frontend_helps') }}" class="nav-link font-weight-bold {{ route::is('frontend_helps') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/helps.png" class="rounded-circle" style="width:20px;height:15px;" />  Helps</a></li>
                </ul>
                <ul class="nav">
                    <li class="nav-item"><a href="{{ route('frontend_privacys') }}" class="nav-link font-weight-bold {{ route::is('frontend_privacys') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/privacy.png" class="rounded-circle" style="width:20px;height:15px;" />   Privacy</a></li>
                    <li class="nav-item"><a href="{{ route('frontend_services') }}" class="nav-link font-weight-bold {{ route::is('frontend_services') ? 'text-white bg-secondary active' : '' }} "> <img src="../icons/service.png" class="rounded-circle" style="width:20px;height:15px;" />  Services</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
</body>
</html>


         @extends('layouts.master')
            @section('title')
                student all | Shariatpur Technical school and collage
            @endsection

            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Students</li>
            @endsection

            @section('content')
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">all student list Below Here</div>
                    <div class="p-4">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('students_photos/default.jpg') }}" class="img-fluid card-img-top shadow-sm  rounded" style="height: 250px;">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="dropdown-item shadow-sm {{ route::is('frontend_student_ix') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_ix') }}">Class ix Student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_x') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_x') }}">Class x Student</a>
                            </div>
                            <div class="col-sm-6">
                                <a class="dropdown-item shadow-sm {{ route::is('frontend_student_xi') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_xi') }}">Class xi Student</a>
                                <a class="dropdown-item shadow-sm mt-2{{ route::is('frontend_student_xii') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_xii') }} ">Class xii Student</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="dropdown-item shadow-sm {{ route::is('frontend_student_diploma_8th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_8th') }}">diploma 8th Semester student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_diploma_7th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_7th') }}">diploma 7th Semester student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_diploma_6th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_6th') }}">diploma 6th Semester student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_diploma_5th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_5th') }}">diploma 5th Semester student</a>
                            </div>
                            <div class="col-sm-6">
                                <a class="dropdown-item shadow-sm {{ route::is('frontend_student_diploma_4th') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_4th') }}">diploma 4th Semester student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_diploma_3rd') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_3rd') }}">diploma 3rd Semester student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_diploma_2nd') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_2nd') }}">diploma 2nd Semester student</a>
                                <a class="dropdown-item shadow-sm mt-2 {{ route::is('frontend_student_diploma_1st') ? 'text-white bg-secondary' : '' }} " href="{{ route('frontend_student_diploma_1st') }}">diploma 1st Semester student</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection





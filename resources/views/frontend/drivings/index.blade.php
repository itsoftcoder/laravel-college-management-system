
         @extends('layouts.master')
            @section('title')
                driving course | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Driving Courses</li>

            @endsection

            @section('content')

            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Driving Course</div>
                    @php
                    $driving_courses = \App\Driving_Course::orderBy('id','DESC')->get();
                    @endphp

                @foreach($driving_courses as $driving_course)
                <div class="card-body bg-secondary">
                    <div class="">
                    <img src="../icons/driving.png" class="rounded-circle" style="height:150px;width: 150px;" />
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                           <table class="table table-borderless table-hover bg-white p-3 shadow-sm">
                               <tr>
                                   <th class="text-success">Driving Cousre Name</th>
                                   <td class="">{{ $driving_course->name }}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Course Manager</th>
                                   <td>{{ $driving_course->manager_name }}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Course Month</th>
                                   <td>{{ $driving_course->course_month }}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Course Description</th>
                                   <td>{{ $driving_course->description }}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Updated Date</th>
                                   <th>{{ $driving_course->updated_at }}</th>
                               </tr>

                               <tr class="">
                                   <th><a href="{{ route('frontend_driving_students') }}" class="d-block">Driving Student</a> </th>
                                   <th><a href="{{ route('frontend_driving_teachers') }}" class="d-block">Driving Teacher</a></th>
                               </tr>
                           </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @endsection





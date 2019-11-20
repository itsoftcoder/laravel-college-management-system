
         @extends('layouts.master')
            @section('title')
                driving student | Shariatpur Technical school and collage
            @endsection
         <style>
             .default-driving-pic{
                 position: absolute;
                 top: 70px;
                 left:20px;
             }
         </style>
            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_drivings') }}" class="">Driving Course</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_driving_students') }}">Driving Students</a></li>
                        <li class="breadcrumb-item">{{ $driving_student->name }}</li>

            @endsection

            @section('content')

                    <div class="card mb-2">
                        <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">{{ $driving_student->name }}</div>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('driving_student_photos/default.jpg') }}" class="rounded img-fluid card-img-top p-4 shadow-sm" style="height:300px" />
                        <div class="default-driving-pic">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('driving_student_photos/'.$driving_student->image) }}" class="rounded-circle img-fluid p-2 btn-light shadow-sm" style="height:180px;width: 180px;" />
                        </div>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                   <table class="table table-borderless table-hover bg-white p-3 shadow-sm">
                                       <tr>
                                           <th class="text-success">Student name</th>
                                           <td class="">{{ $driving_student->name }}</td>
                                       </tr>
                                       <tr>
                                           <th class="text-success">Father Name</th>
                                           <td>{{ $driving_student->father_name }}</td>
                                       </tr>
                                       <tr>
                                           <th class="text-success">Driving Course Name</th>
                                           <td>{{ $driving_student->driving_course->name }}</td>
                                       </tr>

                                       <tr>
                                           <th class="text-success">Gender</th>
                                           <td>{{ $driving_student->gender }}</td>
                                       </tr>

                                       <tr>
                                           <th class="text-success">Present Address</th>
                                           <td>{{ $driving_student->present_address }}</td>
                                       </tr>

                                       <tr>
                                           <th class="text-success">Permanant Address</th>
                                           <td>{{ $driving_student->permanant_address }}</td>
                                       </tr>

                                       <tr>
                                           <th class="text-success">Join Date</th>
                                           <td>{{ $driving_student->join_date }}</td>
                                       </tr>

                                       <tr>
                                           <th class="text-success">Date Of birth</th>
                                           <td>{{ $driving_student->date_of_birth }}</td>
                                       </tr>
                                       <tr>
                                           <th class="text-success">Last Update</th>
                                           <th>{{ $driving_student->updated_at }}</th>
                                       </tr>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>

            @endsection





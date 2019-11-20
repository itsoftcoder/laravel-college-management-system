
         @extends('layouts.master')
            @section('title')
                driving students | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_drivings') }}" class="">Driving Course</a></li>
                        <li class="breadcrumb-item">Driving Students</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Driving Student</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../icons/images.png" class="rounded-circle" style="height: 150px;width: 150px;"/>
                            </div>
                            <div class="col-md-8">
                                <p class="lead">
                                    This is a gets page. all gest name and about  below here.
                                    How many time he/she alive here. His/Her skills ,address,join time and other details here.
                                    So,Your are take good
                                    Concept and very good knowelage for this institute.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    $driving_students = \App\Driving_Student::orderBy('id','DESC')->paginate(6);
                    foreach ($driving_students as $driving_student){ $encrypt = base64_encode($driving_student->phone_number);
                 ?>


                    <div class="card mb-2">
                        <div class="card-header">{{ ucwords($driving_student->name) }}</div>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url('driving_student_photos/'.$driving_student->image) }}" class="rounded-circle img-fluid p-2 shadow-sm" style="height:180px;width: 180px;" />
                                </div>
                                <div class="col-md-8">
                                   <table class="table table-borderless table-hover bg-white p-3 shadow-sm">

                                       <tr>
                                           <th class="text-success">Student name</th>
                                           <td class=""><a href="{{ route('frontend_driving_student_show',$encrypt) }}" class="p-2 shadow-sm font-weight-bold">{{ $driving_student->name }}</a></td>
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
                                           <th class="text-success">Last Update</th>
                                           <th>{{ $driving_student->updated_at }}</th>
                                       </tr>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php
                 }
                 ?>

                <div class="pagination d-flex justify-content-center align-content-center">
                    {{ $driving_students->links() }}
                </div>
            @endsection





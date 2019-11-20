
         @extends('layouts.master')
            @section('title')
                driving Teacher | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend_drivings') }}" class="">Driving Course</a></li>
                <li class="breadcrumb-item">Driving Teachers</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Driving Teacher</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../icons/images.png" class="rounded-circle" style="height: 150px;width: 150px;"/>
                            </div>
                            <div class="col-md-8">
                                <p class="lead">
                                    This is a driving teacher page. all driving teacher name and about  below here.
                                    How many time he/she alive here. His/Her skills ,address,join time and other details here.
                                    So,Your are take good
                                    Concept and very good knowelage for this institute.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    $driving_teachers = \App\Driving_Teacher::orderBy('id','DESC')->paginate(4);
                    foreach ($driving_teachers as $driving_teacher){ $encrypt = base64_encode($driving_teacher->email);
                ?>
            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">{{ $driving_teacher->name }}</div>
                <div class="card-body">

                    <div class="row mt-2">
                        <div class="col-md-4">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('driving_teachers_photos/'.$driving_teacher->image) }}" class="rounded-circle p-2 shadow-sm bg-secondary img-fluid" style="height:180px;width: 180px;" />
                        </div>
                        <div class="col-md-8">
                           <table class="table table-borderless table-hover bg-white p-3 shadow-sm">
                               <tr>
                                   <th class="text-success">Driving teacher Name</th>
                                   <td class=""><a href="{{ route('frontend_driving_teacher_show',$encrypt) }}" class="p-2 shadow-sm font-weight-bold">{{ $driving_teacher->name }}</a></td>
                               </tr>
                               <tr>
                                   <th class="text-success">Driving teacher skill</th>
                                   <td>{{ $driving_teacher->skills }}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Driving teacher experience</th>
                                   <td>{{ $driving_teacher->experience }}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Driving course name</th>
                                   <td>{{ $driving_teacher->driving_course->name}}</td>
                               </tr>
                               <tr>
                                   <th class="text-success">Updated Date</th>
                                   <th>{{ $driving_teacher->updated_at }}</th>
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
                    {{ $driving_teachers->links() }}
                </div>
            @endsection






         @extends('layouts.master')
            @section('title')
                Teacher details show | Shariatpur Technical school and collage
            @endsection

            <style>
                .default-teacher-img{
                    position: absolute;
                    top: 63px;
                    left: 16px;
                }
            </style>

            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_teachers') }}" class="">Teachers</a></li>
                        <li class="breadcrumb-item">Teacher Details</li>

            @endsection

            @section('content')
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Teacher Details Below Here</div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/default.jpg') }}" class="img-fluid card-img-top shadow-sm p-3 rounded" style="height: 250px;">
                    <div class="default-teacher-img">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/'.$teacher->image) }}" class="rounded-circle shadow-sm p-1 bg-white img-fluid" style="width: 180px;height: 150px;">
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover">
                            <tr>
                                <th>Teacher Name </th>
                                <td>{{ $teacher->name }}</td>
                            </tr>
                            <tr>
                                <th>Profetion</th>
                                <td>{{ $teacher->profetion }}</td>
                            </tr>
                            <tr>
                                <th>Skills</th>
                                <td>{{ $teacher->skills }}</td>
                            </tr>
                            <tr>
                                <th>Join Date</th>
                                <td>{{ $teacher->join_date }}</td>
                            </tr>
                            <tr>
                                <th>Email address</th>
                                <td>{{ $teacher->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $teacher->gender }}</td>
                            </tr>
                            <tr>
                                <th>Present Address</th>
                                <td>{{ $teacher->present_address }}</td>
                            </tr>
                            <tr>
                                <th>Permanant Address</th>
                                <td>{{ $teacher->permanant_address }}</td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{ $teacher->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>{{ $teacher->age }}</td>
                            </tr>

                            <tr>
                                <th>About</th>
                                <td>{{ $teacher->about }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer"><span>Last Updated : </span> {{ $teacher->updated_at }}</div>
                </div>
            @endsection






         @extends('layouts.master')
            @section('title')
                student details show | Shariatpur Technical school and collage
            @endsection
<style>
    .default-student-img{
        position: absolute;
        top: 63px;
        left: 16px;
    }
</style>

            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_students') }}" class="">Students</a></li>
                        <li class="breadcrumb-item">Student Details</li>

            @endsection

            @section('content')
                <div class="card">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Student Details Below Here</div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('students_photos/default.jpg') }}" class="img-fluid card-img-top shadow-sm p-3 rounded" style="height: 250px;">
                    <div class="default-student-img">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('students_photos/'.$student->image) }}" class="rounded-circle shadow-sm p-1 bg-white img-fluid" style="width: 180px;height: 150px;">
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-hover">
                            <tr>
                                <th>Student Name </th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Father Name</th>
                                <td>{{ $student->father_name }}</td>
                            </tr>
                            <tr>
                                <th>Class Name</th>
                                <td>{{ $student->class->name }}</td>
                            </tr>
                            <tr>
                                <th>Department Name</th>
                                <td>{{ $student->department->name }}</td>
                            </tr>
                            <tr>
                                <th>Email address</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Shift</th>
                                <td>{{ $student->shift }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $student->gender }}</td>
                            </tr>
                            <tr>
                                <th>Present Address</th>
                                <td>{{ $student->present_address }}</td>
                            </tr>
                            <tr>
                                <th>Permanant Address</th>
                                <td>{{ $student->permanant_address }}</td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{ $student->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Session</th>
                                <td>{{ $student->session }}</td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                @if($student->semester == 1)
                                    <td>First Semester</td>
                                @elseif($student->semester == 2)
                                    <td>Second Semester</td>
                                @elseif($student->semester == 3)
                                    <td>Third Semester</td>
                                @elseif($student->semester == 4)
                                    <td>Fourth Semester</td>
                                @elseif($student->semester == 5)
                                    <td>Fifth Semester</td>
                                @elseif($student->semester == 6)
                                    <td>Sixth Semester</td>
                                @elseif($student->semester == 7)
                                    <td>Seventh Semester</td>
                                @elseif($student->semester == 8)
                                    <td>Eighth Semester</td>
                                @else
                                    <td>Nothing Semester</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Status</th>
                                @if($student->status == 1)
                                <td>Regular</td>
                                @else
                                <td>Irregular</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer"><span>Last Updated : </span> {{ $student->updated_at }}</div>
                </div>
            @endsection





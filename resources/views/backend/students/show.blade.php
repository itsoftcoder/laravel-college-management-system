@extends('layouts.app')

@section('title')
    Show student
@endsection
<style>
    .main-pic{
        position: absolute;
        top: 85px;
        left: 30px;
    }
</style>
@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('backend_student_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage student</a>
            <a href="{{ route('backend_student_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add student</a>
        </div>
        <div class="default-pic">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/default.jpg') }}" class="card-img-top rounded p-4 bg-light" style="height: 250px;"/>
        </div>
        <div class="main-pic">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('students_photos/'.$student->image) }}" class="rounded-circle p-1 bg-light shadow-sm" style="height: 170px; width: 170px;"/>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md bg-light shadow-sm">

                <tr>
                    <th>Name</th>
                    <td>{{ $student->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                </tr>

                <tr>
                    <th>Phone Number</th>
                    <td>{{ $student->phone_number }}</td>
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
                    <th>Father Name</th>
                    <td>{{ $student->father_name }}</td>
                </tr>

                <tr>
                    <th>Mother Name</th>
                    <td>{{ $student->mother_name }}</td>
                </tr>

                <tr>
                    <th>present Address</th>
                    <td>{{ $student->present_address }}</td>
                </tr>

                <tr>
                    <th>permanant Address</th>
                    <td>{{ $student->permanant_address }}</td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>{{ $student->gender }}</td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $student->date_of_birth }}</td>
                </tr>

                <tr>
                    <th>Roll No</th>
                    <td>{{ $student->roll_no }}</td>
                </tr>

                <tr>
                    <th>Shift</th>
                    <td>{{ $student->shift }}</td>
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
                        <td>Nothing semester</td>
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

                <tr>
                    <th>Document</th>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                            Document here
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Document photo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url('students_document/'.$student->document) }}" class="rounded p-2 bg-secondary shadow-sm img-fluid  w-100" style="height: 500px;"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <span class="float-left">Last Updated : <small>{{ $student->updated_at }}</small></span>
            <span class="float-right">Created Date : <small>{{ $student->created_at }}</small></span>
        </div>
    </div>

@endsection




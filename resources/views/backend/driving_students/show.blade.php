@extends('layouts.app')

@section('title')
    Show Driving student
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
            <a href="{{ route('backend_driving_student_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage driving student</a>
            <a href="{{ route('backend_driving_student_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add driving student</a>
        </div>
        <div class="default-pic">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/default.jpg') }}" class="card-img-top rounded p-4 bg-light" style="height: 250px;"/>
        </div>
        <div class="main-pic">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('driving_student_photos/'.$driving_student->image) }}" class="rounded-circle p-1 bg-light shadow-sm" style="height: 170px; width: 170px;"/>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md bg-light shadow-sm">

                <tr>
                    <th>Name</th>
                    <td>{{ $driving_student->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $driving_student->email }}</td>
                </tr>

                <tr>
                    <th>Phone Number</th>
                    <td>{{ $driving_student->phone_number }}</td>
                </tr>

                <tr>
                    <th>Course Name</th>
                    <td>{{ $driving_student->driving_course->name }}</td>
                </tr>

                <tr>
                    <th>Father Name</th>
                    <td>{{ $driving_student->father_name }}</td>
                </tr>

                <tr>
                    <th>Mother Name</th>
                    <td>{{ $driving_student->mother_name }}</td>
                </tr>

                <tr>
                    <th>present Address</th>
                    <td>{{ $driving_student->present_address }}</td>
                </tr>

                <tr>
                    <th>permanant Address</th>
                    <td>{{ $driving_student->permanant_address }}</td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>{{ $driving_student->gender }}</td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $driving_student->date_of_birth }}</td>
                </tr>

                <tr>
                    <th>joining date</th>
                    <td>{{ $driving_student->join_date }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    @if($driving_student->status == 1)
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
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url('driving_student_document/'.$driving_student->document) }}" class="rounded p-2 bg-secondary w-100 shadow-sm img-fluid" style="height: 500px;"/>
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
            <span class="float-left">Last Updated : <small>{{ $driving_student->updated_at }}</small></span>
            <span class="float-right">Created Date : <small>{{ $driving_student->created_at }}</small></span>
        </div>
    </div>

@endsection




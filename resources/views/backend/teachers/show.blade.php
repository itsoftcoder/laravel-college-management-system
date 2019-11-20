@extends('layouts.app')

@section('title')
    Show Teacher
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
            <a href="{{ route('backend_teacher_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage Teacher</a>
            <a href="{{ route('backend_teacher_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Teacher</a>
        </div>
        <div class="default-pic">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/default.jpg') }}" class="card-img-top rounded p-4 bg-light" style="height: 250px;"/>
        </div>
        <div class="main-pic">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/'.$teacher->image) }}" class="rounded-circle p-1 bg-light shadow-sm" style="height: 170px; width: 170px;"/>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md bg-light shadow-sm">

                <tr>
                    <th>Name</th>
                    <td>{{ $teacher->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $teacher->email }}</td>
                </tr>

                <tr>
                    <th>Phone Number</th>
                    <td>{{ $teacher->phone_number }}</td>
                </tr>

                <tr>
                    <th>Profetion</th>
                    <td>{{ $teacher->profetion }}</td>
                </tr>

                <tr>
                    <th>skills</th>
                    <td>{{ $teacher->skills }}</td>
                </tr>

                <tr>
                    <th>present Address</th>
                    <td>{{ $teacher->present_address }}</td>
                </tr>

                <tr>
                    <th>permanant Address</th>
                    <td>{{ $teacher->permanant_address }}</td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>{{ $teacher->gender }}</td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $teacher->date_of_birth }}</td>
                </tr>

                <tr>
                    <th>joining date</th>
                    <td>{{ $teacher->join_date }}</td>
                </tr>

                <tr>
                    <th>salary</th>
                    <td>{{ $teacher->salary }}</td>
                </tr>

                <tr>
                    <th>Age</th>
                    <td>{{ $teacher->age}}</td>
                </tr>

                <tr>
                    <th>About</th>
                    <td>{{ $teacher->about }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <span class="float-left">Last Updated : <small>{{ $teacher->updated_at }}</small></span>
            <span class="float-right">Created Date : <small>{{ $teacher->created_at }}</small></span>
        </div>
    </div>

@endsection




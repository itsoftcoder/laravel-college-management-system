@extends('layouts.app')

@section('title')
    Manage driving course
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage driving course</p>
            <a href="{{ route('backend_driving_course_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add driving course</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="driving_courseTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manager name</th>
                    <th>Course Month</th>
                    <th>Establish Date</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Manager Name</th>
                    <th>Course Month</th>
                    <th>Establish Date</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($driving_courses as $driving_course)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $driving_course->name }}</td>
                        <td>{{ $driving_course->manager_name }}</td>
                        <td>{{ $driving_course->course_month }}</td>
                        <td>{{ $driving_course->establish_date }}</td>
                        <td>{{ $driving_course->description }}</td>
                        <td>{{ $driving_course->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_driving_course_edit',$driving_course->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_driving_course_delete',$driving_course->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this driving course ? ');">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer"><span>Last Updated : <small></small></span></div>
    </div>

@endsection



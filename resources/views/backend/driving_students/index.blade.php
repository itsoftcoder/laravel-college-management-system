@extends('layouts.app')

@section('title')
    Manage driving student
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage driving Student</p>
            <a href="{{ route('backend_driving_student_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Driving student</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="driving_studentTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Course Name</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Course Name</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($driving_students as $driving_student)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $driving_student->name }}</td>
                        <td>{{ $driving_student->father_name }}</td>
                        <td>{{ $driving_student->driving_course->name }}</td>
                        <td><img src="{{ Storage::url('driving_student_photos/'.$driving_student->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $driving_student->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_driving_student_show',$driving_student->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('backend_driving_student_edit',$driving_student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_driving_student_delete',$driving_student->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this driving student? ');">Delete</a>
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



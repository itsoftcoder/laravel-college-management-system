@extends('layouts.app')

@section('title')
    Manage student
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Student</p>
            <a href="{{ route('backend_student_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add student</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="studentTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Class Name</th>
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
                    <th>Class Name</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($students as $student)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->father_name }}</td>
                        <td>{{ $student->class->name }}</td>
                        <td><img src="{{ Storage::url('students_photos/'.$student->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $student->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_student_show',$student->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('backend_student_edit',$student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_student_delete',$student->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this student? ');">Delete</a>
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



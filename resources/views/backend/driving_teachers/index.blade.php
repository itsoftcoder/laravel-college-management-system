@extends('layouts.app')

@section('title')
    Manage driving teachers
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage driving Teachers</p>
            <a href="{{ route('backend_driving_teacher_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Driving Teacher</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="teacherTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Experience</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Experience</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($driving_teachers as $driving_teacher)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $driving_teacher->name }}</td>
                        <td>{{ $driving_teacher->email }}</td>
                        <td>{{ $driving_teacher->experience }}</td>
                        <td><img src="{{ Storage::url('driving_teachers_photos/'.$driving_teacher->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $driving_teacher->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_driving_teacher_show',$driving_teacher->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('backend_driving_teacher_edit',$driving_teacher->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_driving_teacher_delete',$driving_teacher->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this driving teacher? ');">Delete</a>
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



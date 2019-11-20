@extends('layouts.app')

@section('title')
    Manage Department
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <span class="float-left">Manage Departments</span>
            <a href="{{ route('backend_department_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Department</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="department_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($departments as $department)
                    @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->code }}</td>
                            <td><img src="{{ Storage::url('department_photos/'.$department->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                            <td>{{ $department->description }}</td>
                            <td>{{ $department->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('backend_department_edit',$department->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('backend_department_delete',$department->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this department ? ');">Delete</a>
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


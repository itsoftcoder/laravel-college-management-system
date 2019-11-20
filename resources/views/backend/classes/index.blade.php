@extends('layouts.app')

@section('title')
    Manage Classes
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage class</p>
            <a href="{{ route('backend_class_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Class</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="classTable">
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
                @foreach($classes as $class)
                    @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->code }}</td>
                            <td><img src="{{ Storage::url('classes_photos/'.$class->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                            <td>{{ $class->description }}</td>
                            <td>{{ $class->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('backend_class_edit',$class->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('backend_class_delete',$class->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this class ? ');">Delete</a>
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


@extends('layouts.app')

@section('title')
    Manage labs
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage labs</p>
            <a href="{{ route('backend_lab_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add lab</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="labTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Quantity</th>
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
                    <th>Capacity</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($labs as $lab)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $lab->name }}</td>
                        <td>{{ $lab->capacity }}</td>
                        <td>{{ $lab->quantity }}</td>
                        <td><img src="{{ Storage::url('labs_photos/'.$lab->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $lab->description }}</td>
                        <td>{{ $lab->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_lab_edit',$lab->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_lab_delete',$lab->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this lab ? ');">Delete</a>
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



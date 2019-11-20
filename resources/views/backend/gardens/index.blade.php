@extends('layouts.app')

@section('title')
    Manage gardens
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage gardens</p>
            <a href="{{ route('backend_garden_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add garden</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="gardenTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Capacity</th>
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
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($gardens as $garden)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $garden->name }}</td>
                        <td>{{ $garden->capacity }}</td>
                        <td><img src="{{ Storage::url('gardens_photos/'.$garden->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $garden->description }}</td>
                        <td>{{ $garden->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_garden_edit',$garden->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_garden_delete',$garden->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this garden ? ');">Delete</a>
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



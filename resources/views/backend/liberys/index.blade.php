@extends('layouts.app')

@section('title')
    Manage Libary
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Libary</p>
            <a href="{{ route('backend_libary_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Libary</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="libaryTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Building id</th>
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
                    <th>Building id</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($libarys as $libary)
                    @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $libary->name }}</td>

                            @if($libary->building_id <= 0)
                                <td>{{ $libary->building_id }}</td>
                            @else
                                <td>{{ $libary->building->id }} -> {{ $libary->building->name }}</td>
                            @endif

                            <td><img src="{{ Storage::url('libarys_photos/'.$libary->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                            <td>{{ $libary->description }}</td>
                            <td>{{ $libary->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('backend_libary_edit',$libary->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('backend_libary_delete',$libary->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this libary ? ');">Delete</a>
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


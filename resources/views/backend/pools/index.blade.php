@extends('layouts.app')

@section('title')
    Manage pools
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Pools</p>
            <a href="{{ route('backend_pool_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add pool</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="poolTable">
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
                @foreach($pools as $pool)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $pool->name }}</td>
                        <td>{{ $pool->capacity }}</td>
                        <td><img src="{{ Storage::url('pools_photos/'.$pool->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $pool->description }}</td>
                        <td>{{ $pool->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_pool_edit',$pool->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_pool_delete',$pool->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this pool ? ');">Delete</a>
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



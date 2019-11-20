@extends('layouts.app')

@section('title')
    Manage gets
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage gests</p>
            <a href="{{ route('backend_gest_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Gest</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="gestTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($gests as $gest)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $gest->name }}</td>
                        <td>{{ $gest->address }}</td>
                        <td><img src="{{ Storage::url('gests_photos/'.$gest->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $gest->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_gest_show',$gest->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('backend_gest_edit',$gest->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_gest_delete',$gest->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this gest? ');">Delete</a>
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



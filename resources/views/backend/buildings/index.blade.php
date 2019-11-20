@extends('layouts.app')

@section('title')
    Manage Building
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Buildings</p>
            <a href="{{ route('backend_building_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Building</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="buildingTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Establish Date</th>
                    <th>Modifing Date</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Establish Date</th>
                    <th>Modifing Date</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($buildings as $building)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $building->name }}</td>
                        <td>{{ $building->establish_date }}</td>
                        <td>{{ $building->modifing_date }}</td>
                        <td>{{ $building->created_at }}</td>
                        <td>{{ $building->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_building_edit',$building->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_building_delete',$building->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this building ? ');">Delete</a>
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



@extends('layouts.app')

@section('title')
    Manage Hostels
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Hostel</p>
            <a href="{{ route('backend_hostel_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add hostel</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="hostelTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Building id</th>
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
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($hostels as $hostel)
                    @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $hostel->name }}</td>
                            @if($hostel->building_id <= 0)
                                <td>{{ $hostel->building_id }}</td>
                            @else
                                <td>{{ $hostel->building->id }} -> {{ $hostel->building->name }}</td>
                            @endif

                            <td>{{ $hostel->description }}</td>
                            <td>{{ $hostel->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('backend_hostel_edit',$hostel->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('backend_hostel_delete',$hostel->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this hostel ? ');">Delete</a>
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


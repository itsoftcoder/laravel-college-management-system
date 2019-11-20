@extends('layouts.app')

@section('title')
    Manage rooms
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage rooms</p>
            <a href="{{ route('backend_room_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Room</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="roomTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>building id</th>
                    <th>Lab id</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Building id</th>
                    <th>Lab id</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($rooms as $room)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $room->name }}</td>

                        @if($room->building_id <= 0)
                            <td>{{ $room->building_id }}</td>
                        @else
                            <td>{{ $room->building->id }} -> {{ $room->building->name }}</td>
                        @endif

                        @if($room->lab_id <= 0)
                            <td>{{ $room->lab_id }}</td>
                        @else
                            <td>{{ $room->lab->id }} -> {{ $room->lab->name }}</td>
                        @endif

                        <td><img src="{{ Storage::url('rooms_photos/'.$room->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $room->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_room_show',$room->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('backend_room_edit',$room->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_room_delete',$room->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this room? ');">Delete</a>
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



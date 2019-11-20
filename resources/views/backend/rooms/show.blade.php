@extends('layouts.app')

@section('title')
    Show room
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('backend_room_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage room</a>
            <a href="{{ route('backend_room_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add room</a>
        </div>
        <img src="{{ \Illuminate\Support\Facades\Storage::url('rooms_photos/'.$room->image) }}" class="card-img-top rounded p-4 bg-light" style="height: 250px;"/>
        <div class="card-body">
            <table class="table table-hover table-responsive-md bg-light shadow-sm">

                <tr>
                    <th>Name</th>
                    <td>{{ $room->name }}</td>
                </tr>

                <tr>
                    <th>building id with building name</th>

                    @if($room->building_id <= 0)
                        <td>{{ $room->building_id }}</td>
                    @else
                        <td>{{ $room->building->id }} -> {{ $room->building->name }}</td>
                    @endif

                </tr>

                <tr>
                    <th>lab id with lab name</th>

                    @if($room->lab_id <= 0)
                        <td>{{ $room->lab_id }}</td>
                    @else
                        <td>{{ $room->lab->id }} -> {{ $room->lab->name }}</td>
                    @endif

                </tr>

                <tr>
                    <th>length</th>
                    <td>{{ $room->length }} meter</td>
                </tr>

                <tr>
                    <th>width</th>
                    <td>{{ $room->width }} meter</td>
                </tr>

                <tr>
                    <th>height</th>
                    <td>{{ $room->height }} meter</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <span class="float-left">Last Updated : <small>{{ $room->updated_at }}</small></span>
            <span class="float-right">Created Date : <small>{{ $room->created_at }}</small></span>
        </div>
    </div>

@endsection




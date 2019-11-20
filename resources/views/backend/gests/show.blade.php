@extends('layouts.app')

@section('title')
    Show gets
@endsection
<style>
    .defualt-img{
        position: absolute;
        top:90px;
        left: 40px;
    }
</style>
@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('backend_gest_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage Gest</a>
            <a href="{{ route('backend_gest_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add Gest</a>
        </div>
        <img src="{{ \Illuminate\Support\Facades\Storage::url('gests_photos/default.jpg') }}" class="card-img-top rounded p-4 bg-light" style="height: 250px;"/>
        <div class="defualt-img">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('gests_photos/'.$gest->image) }}" class="card-img-top rounded-circle p-1 bg-light" style="height: 180px; width: 180px;"/>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md bg-light shadow-sm">

                <tr>
                    <th>Name</th>
                    <td>{{ $gest->name }}</td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td>{{ $gest->address }}</td>
                </tr>

                <tr>
                    <th>Skills</th>
                    <td>{{ $gest->skills }}</td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>{{ $gest->description }}</td>
                </tr>

                <tr>
                    <th>Join Date</th>
                    <td>{{ $gest->start_date }}</td>
                </tr>

                <tr>
                    <th>End Date</th>
                    <td>{{ $gest->end_date }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <span class="float-left">Last Updated : <small>{{ $gest->updated_at }}</small></span>
            <span class="float-right">Created Date : <small>{{ $gest->created_at }}</small></span>
        </div>
    </div>

@endsection




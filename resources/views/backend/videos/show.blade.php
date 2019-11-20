@extends('layouts.app')

@section('title')
    Manage videos
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('backend_video_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage videos</a>
            <a href="{{ route('backend_video_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add video</a>
        </div>
        <div class="card-body">

            <video src="{{ \Illuminate\Support\Facades\Storage::url('videos/'.$video->video) }}" class="embed-responsive"  controls="true"></video>

        </div>
        <div class="card-footer"><span>Last Updated : <small>{{ $video->updated_at }}</small></span></div>
    </div>

@endsection




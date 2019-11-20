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
            <p class="float-left">Manage videos</p>
            <a href="{{ route('backend_video_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add video</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="videoTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Magazine id</th>
                    <th>Program id</th>
                    <th>Garden id</th>
                    <th>Lab id</th>
                    <th>Pool id</th>
                    <th>video image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Magazine id</th>
                    <th>Program id</th>
                    <th>Garden id</th>
                    <th>Lab id</th>
                    <th>Pool id</th>
                    <th>video image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($videos as $video)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $video->name }}</td>

                        @if($video->magazine_id <= 0)
                        <td>{{ $video->magazine_id }}</td>
                        @else
                        <td>{{ $video->magazine->id }} -> {{ $video->magazine->name }}</td>
                        @endif

                        @if($video->program_id <= 0)
                        <td>{{ $video->program_id }}</td>
                        @else
                        <td>{{ $video->program->id }} -> {{ $video->program->name }}</td>
                        @endif

                        @if($video->garden_id <= 0)
                            <td>{{ $video->garden_id }}</td>
                        @else
                            <td>{{ $video->garden->id }} -> {{ $video->garden->name }}</td>
                        @endif

                        @if($video->lab_id <= 0)
                            <td>{{ $video->lab_id }}</td>
                        @else
                            <td>{{ $video->lab->id }} -> {{ $video->lab->name }}</td>
                        @endif

                        @if($video->pool_id <= 0)
                            <td>{{ $video->pool_id }}</td>
                        @else
                            <td>{{ $video->pool->id }} -> {{ $video->pool->name }}</td>
                        @endif

                        <td><a href="{{ route('backend_video_show',$video->id) }}" title="{{ $video->name }}"><video src="{{ Storage::url('vidoes/'.$video->video) }}" class="rounded" style="height: 40px;width: 80px;" controls></video></a></td>
                        <td>{{ $video->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_video_edit',$video->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_video_delete',$video->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this video? ');">Delete</a>
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



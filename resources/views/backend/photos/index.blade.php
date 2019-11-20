@extends('layouts.app')

@section('title')
    Manage Photos
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage Photos</p>
            <a href="{{ route('backend_photo_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add photo</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="photoTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Magazine id</th>
                    <th>Program id</th>
                    <th>Garden id</th>
                    <th>Lab id</th>
                    <th>Pool id</th>
                    <th>image</th>
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
                    <th>image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($photos as $photo)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $photo->name }}</td>

                        @if($photo->magazine_id <= 0)
                        <td>{{ $photo->magazine_id }}</td>
                        @else
                        <td>{{ $photo->magazine->id }} -> {{ $photo->magazine->name }}</td>
                        @endif

                        @if($photo->program_id <= 0)
                        <td>{{ $photo->program_id }}</td>
                        @else
                        <td>{{ $photo->program->id }} -> {{ $photo->program->name }}</td>
                        @endif

                        @if($photo->garden_id <= 0)
                            <td>{{ $photo->garden_id }}</td>
                        @else
                            <td>{{ $photo->garden->id }} -> {{ $photo->garden->name }}</td>
                        @endif

                        @if($photo->lab_id <= 0)
                            <td>{{ $photo->lab_id }}</td>
                        @else
                            <td>{{ $photo->lab->id }} -> {{ $photo->lab->name }}</td>
                        @endif

                        @if($photo->pool_id <= 0)
                            <td>{{ $photo->pool_id }}</td>
                        @else
                            <td>{{ $photo->pool->id }} -> {{ $photo->pool->name }}</td>
                        @endif

                        <td><img src="{{ Storage::url('photos/'.$photo->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $photo->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_photo_edit',$photo->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_photo_delete',$photo->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this photo? ');">Delete</a>
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



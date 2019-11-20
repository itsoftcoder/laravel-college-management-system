
@extends('layouts.master')
@section('title')
{{ $pool->name }} | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('frontend_pools') }}">Pools</a> </li>
    <li class="breadcrumb-item">{{ $pool->name }}</li>

@endsection

@section('content')


            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)"><span class="shadow-sm text-dark font-weight-bold">{{ $pool->name }}</span>  This pool all photo below here</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('pools_photos/'.$pool->image) }}" class="img-fluid p-2 card-img-top shadow-sm rounded-circle " style="height: 80px; width: 100px;" title="{{ $pool->description }}">
                        </div>
                        <div class="col-md-8">
                                <p><strong class="text-success">Capacity : </strong> <span>{{ $pool->capacity }}</span></p>
                                <p><strong class="text-success">Capacity : </strong><span>{{ $pool->description }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><span>Last Updated : </span> {{ $pool->updated_at }}</div>
            </div>
            @if($pool->videos->count() <= 0)
                <p class="text-danger shadow-sm p-3 font-weight-bold bg-dark">This pool is no videos</p>
            @else
                <?php
                    $videos = \App\Video::orderBy('id','DESC')->where('pool_id',$pool->id)->paginate(5);
                ?>
                @foreach($videos as $video)
                  <div class="card mb-2">
                      <div class="card-header">{{ ucwords($video->name) }}</div>
                      <div class="card-body">
                          <video src="{{ \Illuminate\Support\Facades\Storage::url('videos/'.$video->video) }}" controls class="embed-responsive"></video>
                      </div>
                      <div class="card-footer"><span>Uploaded : </span>{{ $video->updated_at }}</div>
                  </div>
                @endforeach
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $videos->links() }}
                </div>
            @endif

@endsection





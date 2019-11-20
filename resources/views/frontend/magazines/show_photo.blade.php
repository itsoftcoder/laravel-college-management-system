
@extends('layouts.master')
@section('title')
{{ $magazine->name }} | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('frontend_magazines') }}">Magazines</a> </li>
    <li class="breadcrumb-item">{{ $magazine->name }}</li>

@endsection

@section('content')


            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)"><span class="shadow-sm text-dark font-weight-bold">{{ $magazine->name }}</span>  This program all photo below here</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('magazines_photos/'.$magazine->image) }}" class="img-fluid p-2 card-img-top shadow-sm rounded-circle " style="height: 80px; width: 100px;" title="{{ $magazine->description }}">
                        </div>
                        <div class="col-md-8">
                                <p><strong class="text-success">Magazine Start Time : </strong> <span>{{ $magazine->start_time }}</span></p>
                                <p><strong class="text-success">Magazine End Time : </strong><span>{{ $magazine->end_time }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><span>Last Updated : </span> {{ $magazine->updated_at }}</div>
            </div>
            @if($magazine->photos->count() <= 0)
                <p class="text-danger shadow-sm p-3 rounded font-weight-bold bg-dark">This Magazine is no photos</p>
            @else

                    <?php
                    $photos = \App\Photo::orderBy('id','DESC')->where("magazine_id",$magazine->id)->paginate(5);
                    ?>
                @foreach($photos as $photo)
                  <div class="card mb-2">
                      <div class="card-header">{{ ucwords($photo->name) }}</div>
                      <div class="card-body">
                          <img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="img-fluid card-img-top rounded  shadow-sm" style="height: 300px;">
                      </div>
                      <div class="card-footer"><span>Uploaded : </span>{{ $photo->updated_at }}</div>
                  </div>
                @endforeach
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $photos->links() }}
                </div>
            @endif

@endsection





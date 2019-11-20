
@extends('layouts.master')
@section('title')
{{ $lab->name }} | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('frontend_labs') }}">Labs</a> </li>
    <li class="breadcrumb-item">{{ $lab->name }}</li>

@endsection

@section('content')


            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)"><span class="shadow-sm text-dark font-weight-bold">{{ $lab->name }}</span>  This lab all photo below here</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('labs_photos/'.$lab->image) }}" class="img-fluid p-2 card-img-top shadow-sm rounded-circle " style="height: 80px; width: 100px;" title="{{ $lab->description }}">
                        </div>
                        <div class="col-md-8">
                                <p><strong class="text-success">Quantity : </strong> <span>{{ $lab->quantity }}</span></p>
                                <p><strong class="text-success">Capacity : </strong><span>{{ $lab->capacity }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><span>Last Updated : </span> {{ $lab->updated_at }}</div>
            </div>
            @if($lab->photos->count() <= 0)
                <p class="text-danger shadow-sm p-3 font-weight-bold bg-dark">This lab is no photos</p>
            @else
                <?php
                    $photos = \App\Photo::orderBy('id','DESC')->where('lab_id',$lab->id)->paginate(5);
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





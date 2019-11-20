
@extends('layouts.master')
@section('title')
Programs | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item">Programs</li>

@endsection

@section('content')

<div class="card mb-2">
    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Programs</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="../icons/program.png" class="card-img img-fluid" style="height:200px;"/>
            </div>
            <div class="col-md-8">
                <p class="lead">This is the program page.Here are many program name, image and other
                details below.and one program when click the program and show this program photos and videos</p>
            </div>
        </div>
    </div>
</div>

           <?php
              $programs = \App\Program::orderBy('id','DESC')->paginate(6);
              foreach ($programs as $program){
            ?>
            <div class="card mb-2">
                <div class="card-header">{{ $program->name }}</div>
                <img src="{{ \Illuminate\Support\Facades\Storage::url('programs_photos/'.$program->image) }}" class="img-fluid p-4 card-img-top shadow-sm " style="height: 250px;" title="{{ $program->description }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-baseline">
                        <p><strong class="text-success">Program Start Time : </strong> <span>{{ $program->start_time }}</span></p>
                        <p><strong class="text-success">Program End Time : </strong><span>{{ $program->end_time }}</span></p>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            @if($program->photos->count() <= 0 )
                                <p class="text-danger shadow-sm p-1">This program no photos uploaded here</p>
                            @else
                                <span class="text-white bg-secondary d-block p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_program_photo_show',$program->name) }}" class="font-weight-bold text-white d-block">This program all Photos</a></span>
                                <ol>
                                    @foreach($program->photos as $photo)
                                        <li class="shadow-sm mt-1 p-1"><img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="rounded-circle shadow-sm p-1" style="width: 30px;height: 20px;">   {{ $photo->name }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if($program->videos->count() <= 0 )
                                <p class="text-danger shadow-sm p-1">This program no Video uploaded here</p>
                            @else
                                <span class="text-white d-block bg-secondary p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_program_video_show',$program->name) }}" class="font-weight-bold text-white d-block">This program All Videos</a></span>
                                <ol>
                                    @foreach($program->videos as $video)
                                        <li class="shadow-sm mt-1 p-1">{{ $video->name }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>



                </div>
                <div class="card-footer"><span>Last Updated : </span> {{ $program->updated_at }}</div>
            </div>
            <?php
             }
             ?>
            <div class="pagination d-flex justify-content-center align-content-center mt-1">
                {{ $programs->links() }}
            </div>
@endsection





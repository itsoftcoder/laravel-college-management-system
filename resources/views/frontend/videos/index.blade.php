
         @extends('layouts.master')
            @section('title')
                all video | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Videos</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">All videos Below here</div>
                    <div class="card-body">
                        <img src="../icons/videos.png" class="card-img img-fluid" style="height:200px" />
                    </div>
                </div>

                <?php
                $videos = \App\Video::orderBy('id','DESC')->paginate(6);
                foreach ($videos as $video){
                ?>
                <div class="card mb-2">
                    <div class="card-header"><span>Video Name : </span><span class="shadow-sm font-weight-bold">{{ $video->name }}</span></div>
                    <div class="card-body">
                        <video src="{{ \Illuminate\Support\Facades\Storage::url('videos/'.$video->video) }}" class="embed-responsive shad" controls title=""></video>
                        <div class="row">
                            <div class="col-md-12">
                                @if($video->program_id <= 0 && $video->magazine_id <= 0  && $video->pool_id <= 0 && $video->garden_id <= 0)
                                    <p>Lab Name : <a href="{{ route('frontend_video_lab',$video->lab->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->lab->name) }}</a></p>
                                @elseif( $video->lab_id <= 0 && $video->magazine_id <= 0  && $video->pool_id <= 0 && $video->garden_id <= 0 )
                                    <p>Program Name : <a href="{{ route('frontend_video_program',$video->program->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->program->name) }}</a></p>
                                @elseif($video->lab_id <= 0 && $video->program_id <= 0  && $video->pool_id <= 0 && $video->garden_id <= 0)
                                    <p>Magazine Name : <a href="{{ route('frontend_video_magazine',$video->magazine->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->magazine->name) }}</a></p>
                                @elseif($video->lab_id <= 0 && $video->magazine_id <= 0  && $video->pool_id <= 0 && $video->program_id <= 0)
                                    <p>Garden Name : <a href="{{ route('frontend_video_garden',$video->garden->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->garden->name) }}</a></p>
                                @elseif($video->lab_id <= 0 && $video->magazine_id <= 0  && $video->program_id <= 0 && $video->garden_id <= 0)
                                    <p>Pool Name : <a href="{{ route('frontend_video_pool',$video->pool->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->pool->name) }}</a></p>
                                @else
                                    <p>Magazine Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->magazine->name) }}</a></p>
                                    <p>Program Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->program->name) }}</a></p>
                                    <p>Lab Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->lab->name) }}</a></p>
                                    <p>Garden Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->garden->name) }}</a></p>
                                    <p>Pool Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($video->pool->name) }}</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $videos->links() }}
                </div>
            @endsection





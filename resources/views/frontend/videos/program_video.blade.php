
         @extends('layouts.master')
            @section('title')
                {{ $program->name }} | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_videos') }}">Videos</a></li>
                        <li class="breadcrumb-item">{{ $program->name }} all videos</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">{{ $program->name }}  All Photos Below here</div>
                    <div class="card-body">
                        <img src="../icons/videos.png" class="card-img img-fluid" style="height:200px" />
                    </div>
                </div>

                @foreach($videos as $video)

                    <div class="card mb-2">
                        <div class="card-header"><span>Video Name : </span><span class="shadow-sm font-weight-bold">{{ $video->name }}</span></div>
                        <video src="{{ \Illuminate\Support\Facades\Storage::url('videos/'.$video->video) }}" class="embed-responsive " controls></video>
                    </div>

                @endforeach
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $videos->links() }}
                </div>
            @endsection






         @extends('layouts.master')
            @section('title')
                Gardens | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Gardens</li>

            @endsection

            @section('content')

            <div class="card mb-2">
                <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">All Gardens Below here</div>
                <div class="card-body">
                    <img src="../icons/garden.png" class="card-img img-fluid" style="height:200px" />
                </div>
            </div>

            <?php
            $gardens = \App\Garden::orderBy('id','DESC')->paginate(6);
            foreach ($gardens as $garden){
            ?>
            <div class="card mb-2">
                <div class="card-header">{{ $garden->name }}</div>
                <img src="{{ \Illuminate\Support\Facades\Storage::url('gardens_photos/'.$garden->image) }}" class="img-fluid p-4 card-img-top shadow-sm " style="height: 250px;" title="{{ $garden->description }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong class="text-success">Capacity : </strong> <span>{{ $garden->capacity }}</span></p>
                            <p class="lead"><strong>Description : </strong> {{ $garden->description }}</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            @if($garden->photos->count() <= 0 )
                                <p class="text-danger shadow-sm p-2 d-block btn-dark font-weight-bold">This garden no photos uploaded here</p>
                            @else
                                <span class="text-white bg-dark d-block p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_garden_photo_show',$garden->name) }}" class="font-weight-bold text-white d-block">This garden all Photos</a></span>
                                <ol>
                                    @foreach($garden->photos as $photo)
                                        <li class="shadow-sm mt-1 p-1"><img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="rounded-circle shadow-sm p-1" style="width: 30px;height: 20px;">   {{ $photo->name }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if($garden->videos->count() <= 0 )
                                <p class="text-danger shadow-sm p-2 bg-dark d-block font-weight-bold">This garden no Video uploaded here</p>
                            @else
                                <span class="text-white d-block bg-dark p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_garden_video_show',$garden->name) }}" class="font-weight-bold text-white d-block">This garden All Videos</a></span>
                                <ol>
                                    @foreach($garden->videos as $video)
                                        <li class="shadow-sm mt-1 p-1">{{ $video->name }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>



                </div>
                <div class="card-footer"><span>Last Updated : </span> {{ $garden->updated_at }}</div>
            </div>
            <?php
            }
            ?>
            <div class="pagination d-flex justify-content-center align-content-center mt-1">
                {{ $gardens->links() }}
            </div>
            @endsection





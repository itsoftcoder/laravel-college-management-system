
         @extends('layouts.master')
            @section('title')
                Magazines | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Magazines</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Magazine</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../icons/magazine.png" class="card-img img-fluid" style="height:200px;"/>
                            </div>
                            <div class="col-md-8">
                                <p class="lead">This is the magazine page.Here are many magazine name, image and other
                                    details below.and one program when click the magazine and show this magazine photos and videos</p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $magazines = \App\Magazine::orderBy('id','DESC')->paginate(6);
                foreach ($magazines as $magazine){
                ?>
                <div class="card mb-2">
                    <div class="card-header">{{ $magazine->name }}</div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('magazines_photos/'.$magazine->image) }}" class="img-fluid p-4 card-img-top shadow-sm " style="height: 250px;" title="{{ $magazine->description }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-baseline">
                            <p><strong class="text-success">Magazine Start Time : </strong> <span>{{ $magazine->start_time }}</span></p>
                            <p><strong class="text-success">Magazine End Time : </strong><span>{{ $magazine->end_time }}</span></p>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                @if($magazine->photos->count() <= 0 )
                                    <p class="text-danger shadow-sm p-1">This Magazine no photos uploaded here</p>
                                @else
                                    <span class="text-white d-block bg-secondary p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_magazine_photo_show',$magazine->name) }}" class="font-weight-bold text-white d-block">This Magazine All Photos</a></span>
                                    <ol>
                                        @foreach($magazine->photos as $photo)
                                            <li class="shadow-sm mt-1 p-1"><img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="rounded-circle shadow-sm p-1" style="width: 30px;height: 20px;">   {{ $photo->name }}</li>
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if($magazine->videos->count() <= 0 )
                                    <p class="text-danger shadow-sm p-1">This Magazine no videos uploaded here</p>
                                @else
                                    <span class="text-white d-block bg-secondary p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_magazine_video_show',$magazine->name) }}" class="font-weight-bold text-white d-block">This Magazine All videos</a> </span>
                                    <ol>
                                        @foreach($magazine->videos as $video)
                                            <li class="shadow-sm mt-1 p-1"> {{ $video->name }}</li>
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer"><span>Last Updated : </span> {{ $magazine->updated_at }}</div>
                </div>
                <?php
                }
                ?>
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $magazines->links() }}
                </div>
            @endsection





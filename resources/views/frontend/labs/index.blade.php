
         @extends('layouts.master')
            @section('title')
               Labs | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Labs</li>

            @endsection

            @section('content')

            <div class="card mb-2">
                <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">All Labs Below here</div>
                <div class="card-body">
                    <img src="../icons/labs.png" class="card-img img-fluid" style="height:200px;"/>
                </div>
            </div>

            <?php
            $labs = \App\Lab::orderBy('id','DESC')->paginate(6);
            foreach ($labs as $lab){
            ?>
            <div class="card mb-2">
                <div class="card-header">{{ $lab->name }}</div>
                <img src="{{ \Illuminate\Support\Facades\Storage::url('labs_photos/'.$lab->image) }}" class="img-fluid p-4 card-img-top shadow-sm " style="height: 250px;" title="{{ $lab->description }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <p><strong class="text-success">Quantity : </strong> <span>{{ $lab->quantity }}</span></p>
                            <p><strong class="text-success">Capacity : </strong><span>{{ $lab->capacity }}</span></p>
                        </div>
                        <div class="col-md-7">
                            <p class="lead"><strong>Description : </strong> {{ $lab->description }}</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            @if($lab->photos->count() <= 0 )
                                <p class="text-danger shadow-sm p-1">This lab no photos uploaded here</p>
                            @else
                                <span class="text-white bg-secondary d-block p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_lab_photo_show',$lab->name) }}" class="font-weight-bold text-white d-block">This lab all Photos</a></span>
                                <ol>
                                    @foreach($lab->photos as $photo)
                                        <li class="shadow-sm mt-1 p-1"><img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="rounded-circle shadow-sm p-1" style="width: 30px;height: 20px;">   {{ $photo->name }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if($lab->videos->count() <= 0 )
                                <p class="text-danger shadow-sm p-1">This lab no Video uploaded here</p>
                            @else
                                <span class="text-white d-block bg-secondary p-2" style="text-shadow: #f1a899 0px 3px 5px;"><a href="{{ route('frontend_lab_video_show',$lab->name) }}" class="font-weight-bold text-white d-block">This lab All Videos</a></span>
                                <ol>
                                    @foreach($lab->videos as $video)
                                        <li class="shadow-sm mt-1 p-1">{{ $video->name }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    </div>



                </div>
                <div class="card-footer"><span>Last Updated : </span> {{ $lab->updated_at }}</div>
            </div>
            <?php
            }
            ?>
            <div class="pagination d-flex justify-content-center align-content-center mt-1">
                {{ $labs->links() }}
            </div>
            @endsection





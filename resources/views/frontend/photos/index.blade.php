
         @extends('layouts.master')
            @section('title')
                All photos | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item">Photos</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">All Photos Below here</div>
                    <div class="card-body">
                        <img src="../icons/photo.png" class="card-img img-fluid" style="height:200px" />
                    </div>
                </div>

                <?php
                $photos = \App\Photo::orderBy('id','DESC')->paginate(6);
                foreach ($photos as $photo){
                ?>
                <div class="card mb-2">
                    <div class="card-header"><span>Photo Name : </span><span class="shadow-sm font-weight-bold">{{ $photo->name }}</span></div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="img-fluid p-4 card-img-top shadow-sm " style="height: 250px;" title="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if($photo->program_id <= 0 && $photo->magazine_id <= 0  && $photo->pool_id <= 0 && $photo->garden_id <= 0)
                                    <p>Lab Name : <a href="{{ route('frontend_photo_lab',$photo->lab->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->lab->name) }}</a></p>
                                @elseif( $photo->lab_id <= 0 && $photo->magazine_id <= 0  && $photo->pool_id <= 0 && $photo->garden_id <= 0 )
                                    <p>Program Name : <a href="{{ route('frontend_photo_program',$photo->program->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->program->name) }}</a></p>
                                @elseif($photo->lab_id <= 0 && $photo->program_id <= 0  && $photo->pool_id <= 0 && $photo->garden_id <= 0)
                                    <p>Magazine Name : <a href="{{ route('frontend_photo_magazine',$photo->magazine->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->magazine->name) }}</a></p>
                                @elseif($photo->lab_id <= 0 && $photo->magazine_id <= 0  && $photo->pool_id <= 0 && $photo->program_id <= 0)
                                    <p>Garden Name : <a href="{{ route('frontend_photo_garden',$photo->garden->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->garden->name) }}</a></p>
                                @elseif($photo->lab_id <= 0 && $photo->magazine_id <= 0  && $photo->program_id <= 0 && $photo->garden_id <= 0)
                                    <p>Pool Name : <a href="{{ route('frontend_photo_pool',$photo->pool->name) }}" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->pool->name) }}</a></p>
                                @else
                                    <p>Magazine Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->magazine->name) }}</a></p>
                                    <p>Program Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->program->name) }}</a></p>
                                    <p>Lab Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->lab->name) }}</a></p>
                                    <p>Garden Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->garden->name) }}</a></p>
                                    <p>Pool Name : <a href="" class="font-weight-bold shadow-sm p-2 bg-dark text-white d-block">{{ ucwords($photo->pool->name) }}</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $photos->links() }}
                </div>
            @endsection





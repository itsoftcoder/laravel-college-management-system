
         @extends('layouts.master')
            @section('title')
                {{ $magazine->name }} | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_photos') }}">Photos</a></li>
                        <li class="breadcrumb-item">{{ $magazine->name }} all photos</li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">{{ $magazine->name }}  All Photos Below here</div>
                    <div class="card-body">
                        <img src="../icons/photo.png" class="card-img img-fluid" style="height:200px" />
                    </div>
                </div>

              @foreach($photos as $photo)

                <div class="card mb-2">
                    <div class="card-header"><span>Photo Name : </span><span class="shadow-sm font-weight-bold">{{ $photo->name }}</span></div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('photos/'.$photo->image) }}" class="img-fluid p-4 card-img-top shadow-sm " style="height: 250px;" title="">
                </div>

               @endforeach
                <div class="pagination d-flex justify-content-center align-content-center mt-1">
                    {{ $photos->links() }}
                </div>
            @endsection





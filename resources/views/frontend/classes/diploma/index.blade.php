
         @extends('layouts.master')
            @section('title')
                class diploma in engineering | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" class="">class</a></li>
                        <li class="breadcrumb-item"><a href="#">diploma in engineering</a> </li>

            @endsection

            @section('content')

                <div class="card mb-2">
                    <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Class</div>

                    {{-- =====   get class where class name equal diploma in engineer ======== --}}
                    @php
                        $diplomas = \App\Classe::where('name','diploma in engineering')->get();
                    @endphp

                    {{--  diplomas class take and work with foreach **
                        **  and assign veriable diploma **
                     --}}
                    @foreach($diplomas as $diploma)

                        <div class="p-3">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('classes_photos/'.$diploma->image) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="Diploma in engineering class photo" title="diploma in engineering class photo">
                        </div>

                        <div class="card-body">
                            <p><strong class="text-success">Class Name : </strong>{{ ucwords($diploma->name) }}</p>
                            <p><strong class="text-success">Class Code : </strong>{{ $diploma->code }}</p>
                            <p><strong class="text-success">Class Description : </strong>{{ $diploma->description }}</p>
                        </div>
                        <div class="card-footer"><span>Last Updated : </span><small>{{ $diploma->updated_at }}</small></div>
                    @endforeach
                </div>
            @endsection





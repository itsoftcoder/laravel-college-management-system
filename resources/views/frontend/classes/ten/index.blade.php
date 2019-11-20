
@extends('layouts.master')
@section('title')
    class ten | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">class</a></li>
        <li class="breadcrumb-item"><a href="#">ten</a> </li>

@endsection

@section('content')

    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Class</div>

        {{-- =====   get class where class name equal ten ======== --}}
        @php
            $tens = \App\Classe::where('name','ten')->get();
        @endphp

        {{--  tens class take and work with foreach **
            **  and assign veriable ten **
         --}}
        @foreach($tens as $ten)

            <div class="p-3">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('classes_photos/'.$ten->image) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="class ten photo" title="class ten photo">
            </div>

            <div class="card-body">
                <p><strong class="text-success">Class Name : </strong>{{ ucwords($ten->name) }}</p>
                <p><strong class="text-success">Class Code : </strong>{{ $ten->code }}</p>
                <p><strong class="text-success">Class Description : </strong>{{ $ten->description }}</p>
            </div>
            <div class="card-footer"><span>Last Updated : </span><small>{{ $ten->updated_at }}</small></div>
        @endforeach
    </div>
@endsection






@extends('layouts.master')
@section('title')
    class nine | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">class</a></li>
        <li class="breadcrumb-item"><a href="#">nine</a> </li>

@endsection

@section('content')

    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Class</div>

        {{-- =====   get class where class name equal nine ======== --}}
        @php
            $nines = \App\Classe::where('name','nine')->get();
        @endphp

        {{--  nines class take and work with foreach **
            **  and assign veriable nine **
         --}}
        @foreach($nines as $nine)

            <div class="p-3">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('classes_photos/'.$nine->image) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="class nine photo" title="class nine photo">
            </div>

            <div class="card-body">
                <p><strong class="text-success">Class Name : </strong>{{ ucwords($nine->name) }}</p>
                <p><strong class="text-success">Class Code : </strong>{{ $nine->code }}</p>
                <p><strong class="text-success">Class Description : </strong>{{ $nine->description }}</p>
            </div>
            <div class="card-footer"><span>Last Updated : </span><small>{{ $nine->updated_at }}</small></div>
        @endforeach
    </div>
@endsection






@extends('layouts.master')
@section('title')
    class xii | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">class</a></li>
        <li class="breadcrumb-item"><a href="#">xii</a> </li>

@endsection

@section('content')

    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Class</div>

        {{-- =====   get class where class name twelve ======== --}}
        @php
            $twelves = \App\Classe::where('name','twelve')->get();
        @endphp

        {{--  twelves class take and work with foreach **
            **  and assign veriable diploma **
         --}}
        @foreach($twelves as $twelve)

            <div class="p-3">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('classes_photos/'.$twelve->image) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="class twelve hsc secound year photo" title="class twelve photo">
            </div>

            <div class="card-body">
                <p><strong class="text-success">Class Name : </strong>{{ ucwords($twelve->name) }}</p>
                <p><strong class="text-success">Class Code : </strong>{{ $twelve->code }}</p>
                <p><strong class="text-success">Class Description : </strong>{{ $twelve->description }}</p>
            </div>
            <div class="card-footer"><span>Last Updated : </span><small>{{ $twelve->updated_at }}</small></div>
        @endforeach
    </div>
@endsection





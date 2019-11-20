
@extends('layouts.master')
@section('title')
    class xi | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">class</a></li>
        <li class="breadcrumb-item"><a href="#">xi</a> </li>

@endsection

@section('content')

    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Class</div>

        {{-- =====   get class where class name eleven ======== --}}
        @php
            $elevens = \App\Classe::where('name','eleven')->get();
        @endphp

        {{--  elevens class take and work with foreach **
            **  and assign veriable eleven **
         --}}
        @foreach($elevens as $eleven)

            <div class="p-3">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('classes_photos/'.$eleven->image) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="class eleven  hsc 1st year photo" title="class eleven photo">
            </div>

            <div class="card-body">
                <p><strong class="text-success">Class Name : </strong>{{ ucwords($eleven->name) }}</p>
                <p><strong class="text-success">Class Code : </strong>{{ $eleven->code }}</p>
                <p><strong class="text-success">Class Description : </strong>{{ $eleven->description }}</p>
            </div>
            <div class="card-footer"><span>Last Updated : </span><small>{{ $eleven->updated_at }}</small></div>
        @endforeach
    </div>
@endsection





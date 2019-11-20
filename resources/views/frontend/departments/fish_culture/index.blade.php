
@extends('layouts.master')
@section('title')
    Fish Culture department | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">departments</a></li>
        <li class="breadcrumb-item"><a href="#" class="">fish culture</a></li>

@endsection

@section('content')
    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Department</div>
        {{-- =====   get department where department equal fish culture ======== --}}
        @php
            $fish_cultures = \App\Department::where('name','fish culture')->get();
        @endphp

        {{--  fish_cultures department take and work with foreach **
            **  and assign veriable fish_culture **
         --}}
        @foreach($fish_cultures as $fish_culture)

        <div class="p-3">
            <img src="{{ \Illuminate\Support\Facades\Storage::url('department_photos/'.$fish_culture->image ) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" title="Fish Culture Department photo" alt="Fish Culture Department photo">
        </div>
        <div class="card-body">
            <p><strong class="text-success">Department Name : </strong>{{ ucfirst($fish_culture->name) }}</p>
            <p><strong class="text-success">Department Code : </strong>{{ $fish_culture->code }}</p>
            <p><strong class="text-success">Department Description :</strong>{{ ucfirst($fish_culture->description) }}</p>
        </div>
        <div class="card-footer"><span>last updated :<small>{{ $fish_culture->updated_at }}</small></span></div>
            @endforeach

    </div>
@endsection





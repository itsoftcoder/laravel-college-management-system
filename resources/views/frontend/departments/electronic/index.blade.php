
@extends('layouts.master')
@section('title')
    Electronic department | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">departments</a></li>
        <li class="breadcrumb-item"><a href="#" class="">electronic</a></li>

@endsection

@section('content')
    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Department</div>
        {{-- =====   get department where department equal electronic ======== --}}
        @php
            $electronics = \App\Department::where('name','electronic')->get();
        @endphp

        {{--  electronics department take and work with foreach **
            **  and assign veriable electronic **
         --}}
        @foreach($electronics as $electronic)

                <div class="p-3">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url('department_photos/'.$electronic->image) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="Electronic Deparment Photos" title="Electronic Department Photo">
                </div>
                <div class="card-body">
                    <p><strong class="text-success">Department Name : </strong>{{ ucwords($electronic->name) }}</p>
                    <p><strong class="text-success">Department Code : </strong>{{ $electronic->code }}</p>
                    <p><strong class="text-success">Department Description : </strong>{{ ucfirst($electronic->description) }}</p>
                </div>
                <div class="card-footer"><span>last updated :<small>{{ $electronic->updated_at }}</small></span></div>

        @endforeach
    </div>
@endsection





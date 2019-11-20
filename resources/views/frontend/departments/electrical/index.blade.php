
@extends('layouts.master')
@section('title')
    Electrical department | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">departments</a></li>
        <li class="breadcrumb-item"><a href="#" class="">electrical</a></li>

@endsection

@section('content')
    <div class="card mb-2">
        <div class="card-header" style="background: linear-gradient(#EED3D7,#ff95dc,#EED3D7)" >Department</div>

        {{-- =====   get department where department equal electrical ======== --}}
        @php
            $electricals = \App\Department::where('name','electrical')->get();
        @endphp

        {{--  electricals department take and work with foreach **
            **  and assign veriable electrical **
         --}}
        @foreach($electricals as $electrical)

            <div class="p-3">
                <img src="{{ \Illuminate\Support\Facades\Storage::url('department_photos/'.$electrical->image ) }}" class="img-fluid shadow rounded card-img-top" style="height: 300px;" alt="Electrical department photo" title="Electrical Department Photos">
            </div>

            <div class="card-body">
                <p><strong class="text-success">Department Name : </strong>{{ ucfirst($electrical->name) }}</p>
                <p><strong class="text-success">Department Code : </strong>{{ $electrical->code }}</p>
                <p><strong class="text-success">Department Description : </strong>{{ ucfirst($electrical->description) }}</p>
            </div>
            <div class="card-footer"><span>last updated :<small>{{ $electrical->updated_at }}</small></span></div>

        @endforeach

    </div>
@endsection





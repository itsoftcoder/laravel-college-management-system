
@extends('layouts.master')
@section('title')
Teachers | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item">Teachers</li>

@endsection

@section('content')

<div class="card mb-2">
    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Shariyatpur Technical school and Collage All Teachers below here</div>
</div>

<?php

$teachers = \App\Teacher::orderBy('id','ASC')->paginate(6);
foreach ($teachers as $teacher){
$encrypt = base64_encode($teacher->phone_number);
?>
<div class="card mb-2">
    <div class="card-header"><span>{{ ucwords($teacher->name) }}</span></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('frontend_teacher_show',$encrypt) }}"><img src="{{ \Illuminate\Support\Facades\Storage::url('teachers_photos/'.$teacher->image) }}" class="rounded-circle img-fluid shadow-sm p-1" style="height: 150px;width: 150px" /></a>
            </div>
            <div class="col-md-8">
                <table class="table table-hover table-borderless">
                    <tr>
                        <th>Teacher Name</th>
                        <td><a href="{{ route('frontend_teacher_show',$encrypt) }}" class="d-block shadow-sm font-weight-bold pt-0 pl-2 pb-2">{{ ucwords($teacher->name) }}</a></td>
                    </tr>
                    <tr>
                        <th>Profetion</th>
                        <td>{{ $teacher->profetion }}</td>
                    </tr>
                    <tr>
                        <th>skills</th>
                        <td>{{ $teacher->skills }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $teacher->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer"><span>Last Updated : <small>{{ $teacher->updated_at }}</small></span></div>
</div>

<?php
}
?>
<div class="pagination d-flex justify-content-center align-content-center">
    {{ $teachers->links() }}
</div>

@endsection





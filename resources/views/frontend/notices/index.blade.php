
@extends('layouts.master')
@section('title')
    Notices | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">Notices</a></li>

@endsection

@section('content')

<div class="card mb-2 rounded">
    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Notices</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="../icons/notice.png" class="rounded-circle" style="height:100px;width: 100px;" />
            </div>
            <div class="col-md-4">
                <a href="#Computer">Computer</a>
            </div>
            <div class="col-md-4">
                <a href="#Nine">Nine</a>
            </div>
        </div>
    </div>
</div>

@php
    $notices = \App\Notice::orderBy('id','DESC')->paginate(5);
@endphp
@foreach($notices as $notice)
    <div class="card mb-2">
        <div class="card-header">
            @if($notice->class_id <= 0)
                <span id="{{ ucfirst($notice->department->name) }}">Department Name : <span class="text-success font-weight-bold">{{ ucfirst($notice->department->name) }}</span> </span>

            @elseif($notice->department_id <= 0)
                <span id="{{ ucfirst($notice->class->name) }}">Class Name : <span class="text-success">{{ ucfirst($notice->class->name) }}</span> </span>
            @else
            <div class="clearfix">
                <span class="float-left" id="{{ ucfirst($notice->department->name) }}">Department Name : <span class="text-success">{{ ucfirst($notice->department->name) }}</span> </span>
                <span class="float-right" id="{{ ucfirst($notice->class->name) }}">Class Name : <span class="text-success">{{ ucfirst($notice->class->name) }}</span> </span>
            </div>
            @endif
        </div>
        <div class="card-body">
            <table class="table table-borderless mt-3 mb-2">
                    <div class="mt-2 mb-2">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('notices_photos/'.$notice->document) }}"  class="card-img-top img-fluid rounded shadow">
                    </div>

                <tr>
                        <th>Notice Name : </th>
                        <td>{{ $notice->name }}</td>
                    </tr>
            </table>
        </div>
        <div class="card-footer"><span class="text-info">uploaded Date : </span>{{ $notice->updated_at }}</div>
    </div>

@endforeach

<div class="pagination d-flex justify-content-center align-content-center">
    {{ $notices->links() }}
</div>
@endsection





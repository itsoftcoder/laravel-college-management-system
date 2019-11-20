
@extends('layouts.master')
@section('title')
    liberys | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
        <li class="breadcrumb-item"><a href="#" class="">Liberys</a></li>

@endsection

@section('content')

<div class="card">
    <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899)">Libarys</div>

    <div class="card-body">
        <center><img src="../icons/libary.png" class="rounded-circle text-center" style="height:100px;width:100px;"/></center>
            @php
            $libarys = \App\Libary::all();
            @endphp
        <table class="table table-borderless">
            @foreach($libarys as $libary)
                <img src="{{ \Illuminate\Support\Facades\Storage::url('libarys_photos/'.$libary->image) }}" class="card-img-top rounded shadow img-fluid" />
                <tr>
                    <th class="text-success">Libary Name </th>
                    <td>{{ ucwords($libary->name) }}</td>
                </tr>
                <tr>
                    <th class="text-success">Description</th>
                    <td>{{ ucfirst($libary->description) }}</td>
                </tr>
                <tr>
                    @if($libary->building->count() <= 0 )
                        <th><p class="text-danger">There is no building for this libary</p></th>
                    @else
                    <th class="text-success">Building Name </th>
                    <td>{{ ucwords($libary->building->name) }}</td>
                    @endif
                </tr>
                <tr>
                    <th class="text-success">Book Categorys </th>
                    <td>{{ $libary->book_categorys->count() }}</td>
                </tr>
                <tr>
                    <th class="text-primary">Category Name</th>
                    <th class="text-info">Category Details</th>
                </tr>
                <tr>
                    <table class="table table-borderless table-hover">
                        @foreach($libary->book_categorys as $book_category)
                            <tr>
                                <th style="color: #ff8b33;">{{ ucwords($book_category->name) }}</th>
                                <td class="text-danger">{{ ucfirst($book_category->description) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </tr>
            @endforeach
          </table>

    </div>
    <div class="card-footer"><span>Last updated : <small></small></span></div>
</div>
@endsection





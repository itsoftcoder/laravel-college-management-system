
@extends('layouts.master')
@section('title')
{{ $class->name }} book | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('frontend_books') }}">Books</a> </li>
    <li class="breadcrumb-item">{{ $class->name }}</li>

@endsection

@section('content')

    @foreach($books as $book)

        <div class="card mb-2">
            <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);"><span class="font-weight-bold">Class Name : </span> <span>{{ $book->class->name }}</span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url('books_photos/'.$book->image) }}" class="img-fluid card-img-top shadow-sm rounded-circle" style="height: 100px;">
                    </div>
                    <div class="col-md-9">
                        <table class="table table-hover table-borderless">
                            <tr>
                                <th>Book Name</th>
                                <td>{{ ucwords($book->name) }}</td>
                            </tr>
                            <tr>
                                <th>Author Name</th>
                                <td><a href="{{ route('frontend_author_book_show',$book->author_name) }}" class="shadow-sm d-block">{{ $book->author_name }} </a></td>
                            </tr>
                            <tr>
                                <th>Publication</th>
                                <td><a href="{{ route('frontend_publication_book_show',$book->publication) }}" class="shadow-sm d-block">{{ $book->publication }}</a></td>
                            </tr>
                            <tr>
                                <th>Updated Date</th>
                                <td>{{ $book->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination d-flex justify-content-center align-content-center">
            {{ $books->links() }}
        </div>
    @endforeach

@endsection





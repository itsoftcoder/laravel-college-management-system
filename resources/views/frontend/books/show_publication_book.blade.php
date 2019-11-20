
@extends('layouts.master')
@section('title')
Publication Book | Shariatpur Technical school and collage
@endsection


@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('frontend_books') }}">Books</a> </li>
    <li class="breadcrumb-item">Publication</li>

@endsection

@section('content')

    @foreach($books as $book)

        <div class="card mb-2">
            <div class="card-header" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);"><span class="font-weight-bold">Publication Name : </span> <span>{{ ucwords($book->publication) }}</span></div>
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
                            @if($book->book_category_id <= 0)
                                <tr>
                                    <th>Class Name</th>
                                    <td><a href="{{ route('frontend_class_book_show',$book->class->name) }}" class="shadow-sm d-block">{{ $book->class->name }}</a></td>
                                </tr>
                            @elseif($book->class_id <= 0)
                                <tr>
                                    <th>Book Category</th>
                                    <td><a href="{{ route('frontend_book_category_book_show',$book->book_category->name) }}" class="shadow-sm d-block">{{ $book->book_category->name }}</a></td>
                                </tr>
                            @else
                                <tr>
                                    <th>Class Name</th>
                                    <td><a href="{{ route('frontend_class_book_show',$book->class->name) }}" class="shadow-sm d-block">{{ $book->class->name }}</a></td>
                                </tr>
                                <tr>
                                    <th>Book Category</th>
                                    <td><a href="{{ route('frontend_book_category_book_show',$book->book_category->name) }}" class="shadow-sm d-block">{{ $book->book_category->name }}</a></td>
                                </tr>
                            @endif
                            <tr>
                                <th>Author Name</th>
                                <td><a href="{{ route('frontend_author_book_show',$book->author_name) }}" class="shadow-sm d-block">{{ $book->author_name }}</a></td>
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





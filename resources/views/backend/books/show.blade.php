@extends('layouts.app')

@section('title')
    Show book
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('backend_book_manage') }}" class="btn btn-sm btn-success float-left"><i class="fa fa-sellsy"></i>  Manage book</a>
            <a href="{{ route('backend_book_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add book</a>
        </div>
        <img src="{{ \Illuminate\Support\Facades\Storage::url('books_photos/'.$book->image) }}" class="card-img-top rounded p-4 bg-light" style="height: 250px;"/>
        <div class="card-body">
            <table class="table table-hover table-responsive-md bg-light shadow-sm">

                <tr>
                    <th>Name</th>
                    <td>{{ $book->name }}</td>
                </tr>

                <tr>
                    <th>book category id with book category name</th>

                    @if($book->book_category_id <= 0)
                        <td>{{ $book->book_category_id }}</td>
                    @else
                        <td>{{ $book->book_category->id }} -> {{ $book->book_category->name }}</td>
                    @endif

                </tr>

                <tr>
                    <th>Class id with Class name</th>

                    @if($book->class_id <= 0)
                        <td>{{ $book->class_id }}</td>
                    @else
                        <td>{{ $book->class->id }} -> {{ $book->class->name }}</td>
                    @endif

                </tr>

                <tr>
                    <th>Author Name</th>
                    <td>{{ $book->author_name }}</td>
                </tr>

                <tr>
                    <th>Publication</th>
                    <td>{{ $book->publication }}</td>
                </tr>

            </table>
        </div>
        <div class="card-footer">
            <span class="float-left">Last Updated : <small>{{ $book->updated_at }}</small></span>
            <span class="float-right">Created Date : <small>{{ $book->created_at }}</small></span>
        </div>
    </div>

@endsection




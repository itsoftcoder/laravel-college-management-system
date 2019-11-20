@extends('layouts.app')

@section('title')
    Manage books
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage books</p>
            <a href="{{ route('backend_book_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add book</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="bookTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>book category id</th>
                    <th>class id</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Book category id</th>
                    <th>Class id</th>
                    <th>Image</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($books as $book)
                    @php $i++ @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $book->name }}</td>

                        @if($book->book_category_id <= 0)
                        <td>{{ $book->book_category_id }}</td>
                        @else
                        <td>{{ $book->book_category->id }} -> {{ $book->book_category->name }}</td>
                        @endif

                        @if($book->class_id <= 0)
                        <td>{{ $book->class_id }}</td>
                        @else
                        <td>{{ $book->class->id }} -> {{ $book->class->name }}</td>
                        @endif

                        <td><img src="{{ Storage::url('books_photos/'.$book->image) }}" class="rounded" style="height: 40px;width: 80px;"/></td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('backend_book_show',$book->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('backend_book_edit',$book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('backend_book_delete',$book->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this book? ');">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="card-footer"><span>Last Updated : <small></small></span></div>
    </div>

@endsection



@extends('layouts.app')

@section('title')
    Manage book categorys
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <p class="float-left">Manage book categorys</p>
            <a href="{{ route('backend_book_category_create') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i>  Add book category</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive-md" id="book_categoryTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>libary id</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>libary id</th>
                    <th>Description</th>
                    <th>Modified</th>
                    <th>Action</th>
                </tr>
                </tfoot>

                <tbody>
                @php $i = 0;
                @endphp
                @foreach($book_categorys as $book_category)
                    @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $book_category->name }}</td>
                            <td>{{ $book_category->libary->id }} -> {{ $book_category->libary->name }}</td>
                            <td>{{ $book_category->description }}</td>
                            <td>{{ $book_category->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('backend_book_category_edit',$book_category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('backend_book_category_delete',$book_category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure delete this book category ? ');">Delete</a>
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


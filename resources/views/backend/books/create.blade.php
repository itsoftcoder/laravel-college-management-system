@extends('layouts/app')

@section('title')
    Add new book
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="float-left">Create new book</p>
            <a href="{{ route('backend_book_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage book</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_book_store') }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf


                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="book_category_id" class="col-md-3 col-form-label text-md-right">Book Category Name</label>

                    <div class="col-md-8">
                        <select name="book_category_id" class="form-control @error('book_category_id') is-invalid @enderror" required>
                            <option value="0">Nothing select</option>
                            @foreach($book_categorys as $book_category)
                                <option value="{{ $book_category->id }}">{{ $book_category->name }}</option>
                            @endforeach
                        </select>

                        @error('book_category_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="class_id" class="col-md-3 col-form-label text-md-right">Class Name</label>

                    <div class="col-md-8">
                        <select name="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                            <option value="0">Nothing Select</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>

                        @error('class_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="author_name" class="col-md-3 col-form-label text-md-right">Author Name</label>

                    <div class="col-md-8">
                        <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" pattern="^[A-Za-z  - _]+$" value="{{ old('author_name') }}" required  autocomplete="author_name" autofocus>

                        @error('author_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="publication" class="col-md-3 col-form-label text-md-right">Publication</label>

                    <div class="col-md-8">
                        <input id="publication" type="text" class="form-control @error('publication') is-invalid @enderror" name="publication" value="{{ old('publication') }}"  required pattern="^[A-Za-z - _]+$"  autocomplete="publication">

                        @error('publication')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">Book Photo</label>

                    <div class="col-md-8">
                        <input id="image" type="file" class="form-control form-control-file" name="image" required autocomplete="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-upload"></i>  Save book
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


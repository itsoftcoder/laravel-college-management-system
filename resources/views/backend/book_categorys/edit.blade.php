@extends('layouts/app')

@section('title')
    edit book category
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit book category</span>
            <a href="{{ route('backend_book_category_manage') }}" class="btn btn-sm btn-success float-right">Manage book category</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_book_category_update',$book_category->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                 {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $book_category->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="libary_id" class="col-md-3 col-form-label text-md-right">Libary Name</label>

                    <div class="col-md-8">
                        <select name="libary_id" class="form-control @error('libary_id') is-invalid @enderror">
                            <option value="{{ $book_category->libary->id }}">{{ $book_category->libary->name }}</option>
                            @foreach($libarys as $libary)
                            <option value="{{ $libary->id }}">{{ $libary->name }}</option>
                            @endforeach
                        </select>

                        @error('libary_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $book_category->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-sm btn-success">
                           <i class="fa fa-upload"></i>  Update book category
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


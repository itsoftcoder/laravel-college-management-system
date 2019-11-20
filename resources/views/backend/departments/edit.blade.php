@extends('layouts/app')

@section('title')
    edit departments
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit Department</span>
            <a href="{{ route('backend_department_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage Department</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_department_update',$department->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf
               {{ method_field('PUT') }}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $department->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>

                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $department->code }}" pattern="^[0-9]+$" required autocomplete="code">

                        @error('code')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $department->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Department Photo</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control form-control-file" name="image" required autocomplete="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-sm btn-success">
                          <i class="fa fa-upload"></i>  Update Department
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


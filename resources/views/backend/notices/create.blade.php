@extends('layouts/app')

@section('title')
    Add new notice
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="float-left">Create new Notice</p>
            <a href="{{ route('backend_notice_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage notice</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_notice_store') }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
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
                    <label for="department_id" class="col-md-3 col-form-label text-md-right">Department Name</label>

                    <div class="col-md-8">
                        <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                            <option value="0">Nothing select</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>

                        @error('department_id')
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
                    <label for="image" class="col-md-3 col-form-label text-md-right">Notice Photo</label>

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
                            <i class="fa fa-upload"></i>  Save Notice
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


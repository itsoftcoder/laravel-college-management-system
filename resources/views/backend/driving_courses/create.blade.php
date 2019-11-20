@extends('layouts/app')

@section('title')
    Add new driving course
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="float-left">Create new driving course</p>
            <a href="{{ route('backend_driving_course_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage driving course</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_driving_course_store') }}" data-parsley-validate class="bg-light shadow p-3">
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
                    <label for="course_month" class="col-md-3 col-form-label text-md-right">Course Month</label>

                    <div class="col-md-8">
                        <input id="course_month" type="text" class="form-control @error('course_month') is-invalid @enderror" name="course_month" value="{{ old('course_month') }}"  required placeholder="enter input course month" autocomplete="course_month">

                        @error('course_month')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="establish_date" class="col-md-3 col-form-label text-md-right">establish_date</label>

                    <div class="col-md-8">
                        <input id="establish_date" type="date" class="form-control @error('establish_date') is-invalid @enderror" name="establish_date" value="{{ old('establish_date') }}"  required placeholder="" autocomplete="establish_date">

                        @error('establish_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="manager_name" class="col-md-3 col-form-label text-md-right">Manager Name </label>

                    <div class="col-md-8">
                        <input id="manager_name" type="text" class="form-control @error('manager_name') is-invalid @enderror" name="manager_name" value="{{ old('manager_name') }}"  required placeholder="" autocomplete="manager_name">

                        @error('manager_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ old('description') }}</textarea>
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
                            <i class="fa fa-upload"></i>  Save Driving Course
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


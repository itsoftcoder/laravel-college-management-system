@extends('layouts/app')

@section('title')
    edit driving course
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit driving course</span>
            <a href="{{ route('backend_driving_course_manage') }}" class="btn btn-sm btn-success float-right">Manage Driving Course</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_driving_course_update',$driving_course->id) }}"  data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $driving_course->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="manager_name" class="col-md-3 col-form-label text-md-right">Manage name</label>

                    <div class="col-md-8">
                        <input id="manager_name" type="text" class="form-control @error('manager_name') is-invalid @enderror" name="manager_name" value="{{ $driving_course->manager_name }}" required autocomplete="manager_name">

                        @error('manager_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="course_month" class="col-md-3 col-form-label text-md-right">Course Month</label>

                    <div class="col-md-8">
                        <input id="course_month" type="text" class="form-control @error('course_month') is-invalid @enderror" name="course_month" value="{{ $driving_course->course_month }}" required autocomplete="course_month">

                        @error('course_month')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="establish_date" class="col-md-3 col-form-label text-md-right">Establish Date</label>

                    <div class="col-md-8">
                        <input id="establish_date" type="text" class="form-control @error('establish_date') is-invalid @enderror" name="establish_date" value="{{ $driving_course->establish_date }}" required autocomplete="establish_date">

                        @error('establish_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $driving_course->description }}</textarea>
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
                            <i class="fa fa-upload"></i>  Update Driving Courses
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



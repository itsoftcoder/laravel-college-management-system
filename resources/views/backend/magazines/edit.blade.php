@extends('layouts/app')

@section('title')
    edit magazine
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit magazine</span>
            <a href="{{ route('backend_magazine_manage') }}" class="btn btn-sm btn-success float-right">Manage Magazine</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_magazine_update',$magazine->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $magazine->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="start_time" class="col-md-3 col-form-label text-md-right">start_time</label>

                    <div class="col-md-8">
                        <input id="start_time" type="text" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ $magazine->start_time }}" required autocomplete="start_time">

                        @error('start_time')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="end_time" class="col-md-3 col-form-label text-md-right">end_time</label>

                    <div class="col-md-8">
                        <input id="end_time" type="text" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ $magazine->end_time }}" required autocomplete="end_time">

                        @error('end_time')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $magazine->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">lab Photo</label>

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
                            <i class="fa fa-upload"></i>  Update magazine
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



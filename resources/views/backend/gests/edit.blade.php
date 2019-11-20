@extends('layouts/app')

@section('title')
    edit gest
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit gest</span>
            <a href="{{ route('backend_gest_manage') }}" class="btn btn-sm btn-success float-right">Manage gest</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_gest_update',$gest->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $gest->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="skill" class="col-md-3 col-form-label text-md-right">Skills</label>

                    <div class="col-md-8">
                        <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" pattern="^[A-Za-z _-]+$" value="{{ $gest->skills }}" required autocomplete="skill" autofocus>

                        @error('skill')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>

                    <div class="col-md-8">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $gest->address }}" required autocomplete="address" autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="start_date" class="col-md-3 col-form-label text-md-right">start_date</label>

                    <div class="col-md-8">
                        <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $gest->start_date }}" required autocomplete="start_date">

                        @error('start_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="end_date" class="col-md-3 col-form-label text-md-right">end_date</label>

                    <div class="col-md-8">
                        <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $gest->end_date }}" required autocomplete="end_date">

                        @error('end_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $gest->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">gest Photo</label>

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
                            <i class="fa fa-upload"></i>  Update gest
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



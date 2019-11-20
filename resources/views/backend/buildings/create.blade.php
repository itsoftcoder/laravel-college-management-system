@extends('layouts/app')

@section('title')
    Add new building
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="float-left">Create new building</p>
            <a href="{{ route('backend_building_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage Building</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_building_store') }}" data-parsley-validate class="bg-light shadow p-3">
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
                    <label for="establish_date" class="col-md-3 col-form-label text-md-right">Establish Date</label>

                    <div class="col-md-8">
                        <input id="establish_date" type="date" class="form-control @error('establish_date') is-invalid @enderror" name="establish_date" value="{{ old('establish_date') }}"  required  autocomplete="establish_date">

                        @error('establish_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="modifing_date" class="col-md-3 col-form-label text-md-right">Modifing Date</label>

                    <div class="col-md-8">
                        <input id="modifing_date" type="date" class="form-control @error('modifing_date') is-invalid @enderror" name="modifing_date" value="{{ old('modifing_date') }}"  autocomplete="modifing_date">

                        @error('modifing_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-upload"></i>  Save Building
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



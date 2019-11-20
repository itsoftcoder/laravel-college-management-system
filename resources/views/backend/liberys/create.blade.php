@extends('layouts/app')

@section('title')
    Add new libary
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
                <p class="float-left">Create new libary</p>
                <a href="{{ route('backend_libary_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage libary</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_libary_store') }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
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
                    <label for="code" class="col-md-3 col-form-label text-md-right">Building name</label>

                    <div class="col-md-8">
                        <select name="building_id" class="form-control form-control-sm" required>
                            @foreach($buildings as $building)
                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                            @endforeach
                        </select>
                        @error('building_id')
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




                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">Libary Photo</label>

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
                            <i class="fa fa-upload"></i>  Save Libary
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection

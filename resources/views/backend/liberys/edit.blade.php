@extends('layouts/app')

@section('title')
    edit libary
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit libary</span>
            <a href="{{ route('backend_libary_manage') }}" class="btn btn-sm btn-success float-right">Manage libary</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_libary_update',$libary->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                 {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $libary->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="building_id" class="col-md-3 col-form-label text-md-right">Building Name</label>

                    <div class="col-md-8">
                        <select name="building_id" class="form-control @error('building_id') is-invalid @enderror">
                            <option value="{{ $libary->building->id }}">{{ $libary->building->name }}</option>
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

                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="6" required>{{ $libary->description }}</textarea>
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
                           <i class="fa fa-upload"></i>  Update Libary
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


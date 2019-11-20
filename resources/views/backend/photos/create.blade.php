@extends('layouts/app')

@section('title')
    Add new photo
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="float-left">Create new Photo</p>
            <a href="{{ route('backend_photo_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage photo</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_photo_store') }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
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
                    <label for="magazine_id" class="col-md-3 col-form-label text-md-right">Magazine Name</label>

                    <div class="col-md-8">
                        <select name="magazine_id" class="form-control @error('magazine_id') is-invalid @enderror" required>
                            <option value="0">Nothing select</option>
                            @foreach($magazines as $magazine)
                                <option value="{{ $magazine->id }}">{{ $magazine->name }}</option>
                            @endforeach
                        </select>

                        @error('magazine_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="program_id" class="col-md-3 col-form-label text-md-right">Program Name</label>

                    <div class="col-md-8">
                        <select name="program_id" class="form-control @error('program_id') is-invalid @enderror" required>
                            <option value="0">Nothing Select</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>

                        @error('program_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="garden_id" class="col-md-3 col-form-label text-md-right">Garden Name</label>

                    <div class="col-md-8">
                        <select name="garden_id" class="form-control @error('garden_id') is-invalid @enderror" required>
                            <option value="0">Nothing Select</option>
                            @foreach($gardens as $garden)
                                <option value="{{ $garden->id }}">{{ $garden->name }}</option>
                            @endforeach
                        </select>

                        @error('garden_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="lab_id" class="col-md-3 col-form-label text-md-right">Lab Name</label>

                    <div class="col-md-8">
                        <select name="lab_id" class="form-control @error('lab_id') is-invalid @enderror" required>
                            <option value="0">Nothing Select</option>
                            @foreach($labs as $lab)
                                <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                            @endforeach
                        </select>

                        @error('lab_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="program_id" class="col-md-3 col-form-label text-md-right">Pool Name</label>

                    <div class="col-md-8">
                        <select name="pool_id" class="form-control @error('pool_id') is-invalid @enderror" required>
                            <option value="0">Nothing Select</option>
                            @foreach($pools as $pool)
                                <option value="{{ $pool->id }}">{{ $pool->name }}</option>
                            @endforeach
                        </select>

                        @error('pool_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">Photo</label>

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
                            <i class="fa fa-upload"></i>  Save Photo
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


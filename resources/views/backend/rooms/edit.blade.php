@extends('layouts/app')

@section('title')
    edit room
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="float-left">Edit Room</p>
            <a href="{{ route('backend_room_manage') }}" class="btn btn-sm btn-success float-right"><i class="fa fa-sellsy"></i>  Manage room</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_room_update',$room->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf
{{ method_field('PUT') }}

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $room->name }}" required autocomplete="name" autofocus>

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
                            @if($room->building_id <= 0)
                                <option value="0">Nothing select building</option>
                            @else
                            <option value="{{ $room->building->id }}">{{ $room->building->name }}</option>
                            @endif

                                <option value="0">Not select</option>

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
                    <label for="building_id" class="col-md-3 col-form-label text-md-right">Lab Name</label>

                    <div class="col-md-8">
                        <select name="lab_id" class="form-control @error('lab_id') is-invalid @enderror">
                            @if($room->lab_id <= 0)
                                <option value="0">Nothing Select lab</option>
                            @else
                            <option value="{{ $room->lab->id }}">{{ $room->lab->name }}</option>
                            @endif

                                <option value="0">Not Select</option>

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
                    <label for="length" class="col-md-3 col-form-label text-md-right">Length</label>

                    <div class="col-md-8">
                        <input id="length" type="text" class="form-control @error('length') is-invalid @enderror" name="length" pattern="^[0-9]+$" value="{{ $room->length }}" required placeholder="enter length meter" autocomplete="length" autofocus>

                        @error('length')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="width" class="col-md-3 col-form-label text-md-right">Width</label>

                    <div class="col-md-8">
                        <input id="width" type="text" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ $room->width }}"  required pattern="^[0-9]+$" placeholder="enter width meter" autocomplete="width">

                        @error('width')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="height" class="col-md-3 col-form-label text-md-right">Height</label>

                    <div class="col-md-8">
                        <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $room->height }}"  pattern="^[0-9]+$" required placeholder="enter height meter" autocomplete="height">

                        @error('height')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">Room Photo</label>

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
                            <i class="fa fa-upload"></i>  Update Room
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection


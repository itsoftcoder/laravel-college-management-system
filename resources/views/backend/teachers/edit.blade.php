@extends('layouts/app')

@section('title')
    edit Teacher
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit Teacher</span>
            <a href="{{ route('backend_teacher_manage') }}" class="btn btn-sm btn-success float-right">Manage Teacher</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_teacher_update',$teacher->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $teacher->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $teacher->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-3 col-form-label text-md-right">Phone Num</label>

                            <div class="col-md-8">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" pattern="^[0-9]+$" value="{{ $teacher->phone_number }}" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="profetion" class="col-md-3 col-form-label text-md-right">Profetion</label>

                            <div class="col-md-8">
                                <input id="profetion" type="text" class="form-control @error('profetion') is-invalid @enderror" name="profetion" pattern="^[A-Za-z _-]+$" value="{{ $teacher->profetion }}" required autocomplete="profetion" autofocus>

                                @error('profetion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="skill" class="col-md-3 col-form-label text-md-right">Skill</label>

                            <div class="col-md-8">
                                <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" pattern="^[A-Za-z _-]+$" value="{{ $teacher->skills }}" required autocomplete="skill" autofocus>

                                @error('skill')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="present_address" class="col-md-3 col-form-label text-md-right">Present Address</label>

                            <div class="col-md-8">
                                <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $teacher->present_address }}" required autocomplete="present_address" autofocus>

                                @error('present_address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="permanant_address" class="col-md-3 col-form-label text-md-right">Parmanant Address</label>

                            <div class="col-md-8">
                                <input id="permanant_address" type="text" class="form-control @error('permanant_address') is-invalid @enderror" name="permanant_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $teacher->permanant_address }}" required autocomplete="permanant_address" autofocus>

                                @error('permanant_address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>
                            <div class="col-md-8">
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" required autocomplete="gender" autofocus>
                                    <option value="{{ $teacher->gender }}">{{ ucwords($teacher->gender) }}</option>
                                    @if($teacher->gender == 'male')
                                        <option value="female">Female
                                        <option value="other">Other</option>
                                    @elseif($teacher->gender == 'female')
                                        <option value="male">Male</option>
                                        <option value="other">Other</option>
                                    @else
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    @endif
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="age" class="col-md-3 col-form-label text-md-right">Age</label>
                            <div class="col-md-8">
                                <input type="text" id="age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $teacher->age }}" required autocomplete="age">
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-3 col-form-label text-md-right">Birth Date</label>

                            <div class="col-md-8">
                                <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $teacher->date_of_birth }}"  required  autocomplete="date_of_birth">

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="join_date" class="col-md-3 col-form-label text-md-right">Join date</label>

                            <div class="col-md-8">
                                <input id="join_date" type="text" class="form-control @error('join_date') is-invalid @enderror" name="join_date" value="{{ $teacher->join_date }}"  required  autocomplete="join_date">

                                @error('join_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="salary" class="col-md-3 col-form-label text-md-right">Salary</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" required autofocus autocomplete="salary" value="{{ $teacher->salary }}">

                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">Teacher Photo</label>

                            <div class="col-md-8">
                                <input id="image" type="file" class="form-control form-control-file" name="image" required autocomplete="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <label for="about" class="col-md-3 col-form-label text-md-right">About </label>

                    <div class="col-md-8">

                        <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about" rows="6" required>{{ $teacher->about }}</textarea>
                        @error('about')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-upload"></i>  Update Teacher
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



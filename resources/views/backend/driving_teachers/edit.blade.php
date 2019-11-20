@extends('layouts/app')

@section('title')
    edit driving Teacher
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit Driving Teacher</span>
            <a href="{{ route('backend_driving_teacher_manage') }}" class="btn btn-sm btn-success float-right">Manage Driving Teacher</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_driving_teacher_update',$driving_teacher->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $driving_teacher->name}}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $driving_teacher->email }}" required autocomplete="email" autofocus>

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
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" pattern="^[0-9]+$" value="{{ $driving_teacher->phone_number }}" required autocomplete="phone_number" autofocus>

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
                            <label for="expriance" class="col-md-3 col-form-label text-md-right">Experience</label>

                            <div class="col-md-8">
                                <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience"  value="{{ $driving_teacher->experience }}" required autocomplete="experience" autofocus>

                                @error('experience')
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
                                <input id="skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" pattern="^[A-Za-z _-]+$" value="{{ $driving_teacher->skills }}" required autocomplete="skill" autofocus>

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
                                <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $driving_teacher->present_address }}" required autocomplete="present_address" autofocus>

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
                                <input id="permanant_address" type="text" class="form-control @error('permanant_address') is-invalid @enderror" name="permanant_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $driving_teacher->permanant_address }}" required autocomplete="permanant_address" autofocus>

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
                                    <option value="{{ $driving_teacher->gender }}">{{ ucwords($driving_teacher->gender) }}</option>
                                    @if($driving_teacher->gender == 'male')
                                        <option value="female">Female
                                        <option value="other">Other</option>
                                    @elseif($driving_teacher->gender == 'female')
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
                            <label for="work_hour" class="col-md-3 col-form-label text-md-right">Work Hour</label>
                            <div class="col-md-8">
                                <input type="text" id="work_hour" class="form-control @error('work_hour') is-invalid @enderror" name="work_hour" value="{{ $driving_teacher->work_hour }}" required autocomplete="work_hour">
                                @error('work_hour')
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
                                <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $driving_teacher->date_of_birth }}"  required  autocomplete="date_of_birth">

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
                                <input id="join_date" type="text" class="form-control @error('join_date') is-invalid @enderror" name="join_date" value="{{ $driving_teacher->join_date }}"  required  autocomplete="join_date">

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
                                <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" id="salary" required autofocus autocomplete="salary" value="{{ $driving_teacher->salary }}">

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
                                <input id="image" type="file" class="form-control form-control-file" name="image"  autocomplete="image">

                                @error('image')
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
                            <label for="driving_course_id" class="col-form-label col-md-3 text-md-right">Course Name</label>
                            <div class="col-md-8">
                                <select name="driving_course_id" class="form-control @error('driving_course_id') is-invalid @enderror" required>
                                    <option value="{{ $driving_teacher->driving_course_id }}">{{ $driving_teacher->driving_course->name }}</option>
                                    @foreach($driving_courses as $driving_course)
                                        <option value="{{ $driving_course->id }}">{{ $driving_course->name }}</option>
                                    @endforeach
                                </select>

                                @error('driving_course_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="document" class="col-md-3 col-form-label text-md-right">Document</label>

                            <div class="col-md-8">
                                <input id="document" type="file" class="form-control form-control-file" name="document" autocomplete="document">

                                @error('document')
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

                        <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about" rows="6" required>{{ $driving_teacher->about }}</textarea>
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
                            <i class="fa fa-upload"></i>  Update Driving Teacher
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



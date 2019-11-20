@extends('layouts/app')

@section('title')
    edit driving Student
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit Driving Student</span>
            <a href="{{ route('backend_driving_student_manage') }}" class="btn btn-sm btn-success float-right">Manage Driving Student</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_driving_student_update',$driving_student->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $driving_student->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="driving_course_id" class="col-form-label col-md-3 text-md-right">Course Name</label>
                            <div class="col-md-8">
                                <select name="driving_course_id" class="form-control @error('driving_course_id') is-invalid @enderror" required>
                                    <option value="{{ $driving_student->driving_course_id }}">{{ $driving_student->driving_course->name }}</option>
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
                </div>


                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $driving_student->email }}" required autocomplete="email" autofocus>

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
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" pattern="^[0-9]+$" value="{{ $driving_student->phone_number }}" required autocomplete="phone_number" autofocus>

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
                            <label for="father_name" class="col-md-3 col-form-label text-md-right">Father Name</label>

                            <div class="col-md-8">
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name"  value="{{ $driving_student->father_name }}" pattern="^[A-Za-z -_]+$" required autocomplete="father_name" autofocus>

                                @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="mother_name" class="col-md-3 col-form-label text-md-right">Mother Name</label>

                            <div class="col-md-8">
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" pattern="^[A-Za-z _-]+$" value="{{ $driving_student->mother_name }}" required autocomplete="mother_name" autofocus>

                                @error('mother_name')
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
                                <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $driving_student->present_address }}" required autocomplete="present_address" autofocus>

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
                                <input id="permanant_address" type="text" class="form-control @error('permanant_address') is-invalid @enderror" name="permanant_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $driving_student->permanant_address }}" required autocomplete="permanant_address" autofocus>

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
                                    <option value="{{ $driving_student->gender }}">{{ ucwords($driving_student->gender) }}</option>
                                    @if($driving_student->gender == 'male')
                                        <option value="female">Female
                                        <option value="other">Other</option>
                                    @elseif($driving_student->gender == 'female')
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
                            <label for="work_hour" class="col-md-3 col-form-label text-md-right">Status</label>
                            <div class="col-md-8">
                                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                    @if($driving_student->status == 1)
                                        <option value="{{ $driving_student->status }}">Regular</option>
                                        <option value="0">Irreguler</option>
                                    @else
                                        <option value="{{ $driving_student->status }}">Irregular</option>
                                        <option value="1">Regular</option>
                                    @endif
                                </select>
                                @error('status')
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
                                <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $driving_student->date_of_birth }}"  required  autocomplete="date_of_birth">

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
                                <input id="join_date" type="text" class="form-control @error('join_date') is-invalid @enderror" name="join_date" value="{{ $driving_student->join_date }}"  required  autocomplete="join_date">

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
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">Student Photo</label>

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



                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-3">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-upload"></i>  Update Driving Student
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



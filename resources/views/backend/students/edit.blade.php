@extends('layouts/app')

@section('title')
    edit Student
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="float-left">Edit Student</span>
            <a href="{{ route('backend_student_manage') }}" class="btn btn-sm btn-success float-right">Manage Student</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('backend_student_update',$student->id) }}" enctype="multipart/form-data" data-parsley-validate class="bg-light shadow p-3">
                @csrf

                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-6 col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" pattern="^[A-Za-z _-]+$" value="{{ $student->name}}" required autocomplete="name" autofocus>

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
                            <label for="class_id" class="col-form-label col-md-3 text-md-right">Class Name</label>
                            <div class="col-md-8">
                                <select name="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                                    <option value="{{ $student->class_id }}">{{ $student->class->name }}</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>

                                @error('class_id')
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}" required autocomplete="email" autofocus>

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
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" pattern="^[0-9]+$" value="{{ $student->phone_number }}" required autocomplete="phone_number" autofocus>

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
                                <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name"  value="{{ $student->father_name }}" pattern="^[A-Za-z -_]+$" required autocomplete="father_name" autofocus>

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
                                <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" pattern="^[A-Za-z _-]+$" value="{{ $student->mother_name }}" required autocomplete="mother_name" autofocus>

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
                                <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $student->present_address }}" required autocomplete="present_address" autofocus>

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
                                <input id="permanant_address" type="text" class="form-control @error('permanant_address') is-invalid @enderror" name="permanant_address" pattern="^[A-Za-z _- 0-9]+$" value="{{ $student->permanant_address }}" required autocomplete="permanant_address" autofocus>

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
                                    <option value="{{ $student->gender }}">{{ ucwords($student->gender) }}</option>
                                    @if($student->gender == 'male')
                                        <option value="female">Female
                                        <option value="other">Other</option>
                                    @elseif($student->gender == 'female')
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
                                    @if($student->status == 1)
                                        <option value="{{ $student->status }}">Regular</option>
                                        <option value="0">Irreguler</option>
                                    @else
                                        <option value="{{ $student->status }}">Irregular</option>
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
                                <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $student->date_of_birth }}"  required  autocomplete="date_of_birth">

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
                            <label for="roll_no" class="col-md-3 col-form-label text-md-right">Roll No</label>

                            <div class="col-md-8">
                                <input id="roll_no" type="text" class="form-control @error('roll_no') is-invalid @enderror" name="roll_no" value="{{ $student->roll_no }}"  required  autocomplete="roll_no">

                                @error('roll_no')
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


                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="department_id" class="col-form-label col-md-3 text-md-right">Department Name</label>
                            <div class="col-md-8">
                                <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" required>
                                    <option value="{{ $student->department_id }}">{{ $student->department->name }}</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                                @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="sassion" class="col-md-3 col-form-label text-md-right">Session</label>

                            <div class="col-md-8">
                                <input id="sassion" type="text" class="form-control @error('sassion') is-invalid @enderror" name="sassion" value="{{ $student->session }}"  required  autocomplete="sassion">

                                @error('sassion')
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
                            <label for="shift" class="col-md-3 col-form-label text-md-right">Shift</label>
                            <div class="col-md-8">
                                <select name="shift" class="form-control @error('shift') is-invalid @enderror" required>
                                    @if($student->shift == 'first_shift')
                                        <option value="{{ $student->shift }}">First Shift</option>
                                        <option value="second_shift">Secound Shift</option>
                                    @else
                                        <option value="{{ $student->shift }}">Second Shift</option>
                                        <option value="first_shift">First Shift</option>
                                    @endif
                                </select>
                                @error('shift')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group row">
                            <label for="semester" class="col-form-label col-md-3 text-md-right">Semester</label>
                            <div class="col-md-8">
                                <select name="semester" class="form-control @error('semester') is-invalid @enderror" required>
                                    @if($student->semester == 1)
                                        <option value="{{ $student->semester }}">First Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 2)
                                        <option value="{{ $student->semester }}">Second Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 3)
                                        <option value="{{ $student->semester }}">Third Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 4)
                                        <option value="{{ $student->semester }}">Fourth Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 5)
                                        <option value="{{ $student->semester }}">Fifth Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 6)
                                        <option value="{{ $student->semester }}">Sixth Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 7)
                                        <option value="{{ $student->semester }}">Seventh Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="8">Eighth Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @elseif($student->semester == 8)
                                        <option value="{{ $student->semester }}">Eighth Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="0">Nothing Semester</option>
                                    @else
                                        <option value="{{ $student->semester }}">Nothing Semester</option>
                                        <option value="1">First Semester</option>
                                        <option value="3">Third Semester</option>
                                        <option value="4">Fourth Semester</option>
                                        <option value="5">Fifth Semester</option>
                                        <option value="6">Sixth Semester</option>
                                        <option value="7">Seventh Semester</option>
                                        <option value="2">Second Semester</option>
                                        <option value="8">Eighth Semeter</option>
                                    @endif
                                </select>

                                @error('semester')
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
                            <i class="fa fa-upload"></i>  Update Student
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">Today <?php echo date('d-m-Y');?></div>
    </div>
@endsection



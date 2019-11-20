
         @extends('layouts.master')
            @section('title')
                student class ix fish culture 2nd shift | Shariatpur Technical school and collage
            @endsection


            @section('breadcrumb')

                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_students') }}" class="">Students</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend_student_ix') }}" class="">Class ix</a></li>
                        <li class="breadcrumb-item"><a href="#" class="">Fish Culture</a></li>
                        <li class="breadcrumb-item">Second shift</li>
            @endsection

            @section('content')
                <div class="card mb-2">
                    <div class="card-header font-weight-bold" style="background: linear-gradient(#f1a899,#EED3D7,#f1a899);">Class Nine Computer Department First Shift Students Below Here</div>
                </div>

                <?php
                $classes = \App\Classe::where('name','nine')->get();
                $departments = \App\Department::where('name','fish culture')->get();
                if ($departments->count() <= 0 || $classes->count() <= 0){
                ?>
                <p class='shadow-sm p-2 bg-white rounded text-danger'>No student here for this department or Class</p>
                <?php
                }else{
                foreach ($classes as $class){}
                foreach ($departments as $department){}
                $students = \App\Student::orderBy('id','DESC')->where('class_id',$class->id)->where('department_id',$department->id)->where('shift','second_shift')->paginate(7);
                foreach ($students as $student){
                $encrypt = base64_encode($student->phone_number);
                ?>
                <div class="card mb-2">
                    <div class="card-header"><span>{{ ucwords($student->name) }}</span></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('frontend_student_show',$encrypt) }}"><img src="{{ \Illuminate\Support\Facades\Storage::url('students_photos/'.$student->image) }}" class="rounded-circle img-fluid shadow-sm p-1" style="height: 150px;width: 150px" /></a>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-hover table-borderless">
                                    <tr>
                                        <th>Student Name</th>
                                        <td><a href="{{ route('frontend_student_show',$encrypt) }}" class="d-block shadow-sm pl-3">{{ ucwords($student->name) }}</a></td>
                                    </tr>
                                    <tr>
                                        <th>Father Name</th>
                                        <td>{{ $student->father_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Class Name</th>
                                        <td>{{ $student->class->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Department Name</th>
                                        <td>{{ $student->department->name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"><span>Last Updated : <small>{{ $student->updated_at }}</small></span></div>
                </div>

                <?php
                }
                ?>
                <div class="pagination d-flex justify-content-center align-content-center">
                    {{ $students->links() }}
                </div>

                <?php
                }
                ?>

            @endsection





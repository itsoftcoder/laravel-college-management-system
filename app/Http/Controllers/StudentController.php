<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Department;
use App\Driving_Student;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id','DESC')->get();
        return view('backend/students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        $departments = Department::all();
        return view('backend/students.create',compact('classes','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required | min:3',
            'last_name'  => 'required | min:2',
            'father_name'  => 'required | min:4 ',
            'mother_name'      => 'required | min:4',
            'status'        => 'required',
            'email'      => 'nullable | email | unique:students,email',
            'phone_number' => 'required | min:11 | max:11 | unique:students,phone_number',
            'date_of_birth' => 'required | date',
            'roll_no'     => 'required | unique:students,roll_no',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'image' => 'required | image',
            'gender' => 'required',
            'class_id' => 'required',
            'department_id' => 'required',
            'document' => 'required | image',
            'shift' => 'required',
            'sassion' => 'required',
            'semester' => 'required'

        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $name = $first_name.' '.$last_name;

        $student                  = new Student();
        $student->name            = $name;
        $student->email           = $request->email;
        $student->phone_number    = $request->phone_number;
        $student->father_name     = $request->father_name;
        $student->mother_name     = $request->mother_name;
        $student->status          = $request->status;
        $student->date_of_birth   = $request->date_of_birth;
        $student->roll_no      = $request->roll_no;
        $student->present_address = $request->present_address;
        $student->permanant_address = $request->permanant_address;
        $student->gender          = $request->gender;
        $student->class_id = $request->class_id;
        $student->shift = $request->shift;
        $student->department_id  = $request->department_id;
        $student->session = $request->sassion;
        $student->semester = $request->semester;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/students_photos/',$filename);
            $student->image = $filename;
        }

        if ($request->hasFile('document')){
            $file1 = $request->file('document');
            $extension1 = $file1->getClientOriginalExtension();
            $filename1 = sha1(time()).'.'.$extension1;
            $file1->move('storage/students_document/',$filename1);
            $student->document = $filename1;
        }
        $student->save();
        return redirect()->route('backend_student_manage')->with('status','student added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('backend/students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = Classe::all();
        $departments = Department::all();
        return view('backend/students.edit',compact('student','classes','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'            => 'required | min:3',
            'father_name'       => 'required | min:4 ',
            'mother_name'           => 'required | min:4',
            'status'       => 'required',
            'email'           => "nullable | email | unique:students,email,$id",
            'phone_number'    => "required | min:11 | max:11 | unique:students,phone_number,$id",
            'date_of_birth'   => 'required | date',
            'roll_no'       => "required | unique:students,roll_no,$id",
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'image'           => 'nullable | image',
            'gender'          => 'required',
            'class_id' => 'required',
            'department_id'  => 'required',
            'document'        => 'nullable | image',
            'shift'  => 'required',
            'sassion'  => 'required',
            'semester' => 'required'


        ]);


        $student = Student::findOrFail($id);


        if ($request->hasFile('image') && $request->hasFile('document')){
            if (Storage::delete('public/students_photos/'.$student->image) && Storage::delete('public/students_document/'.$student->document) ) {
                $student->name = $request->name;
                $student->email = $request->email;
                $student->phone_number = $request->phone_number;
                $student->father_name = $request->father_name;
                $student->mother_name = $request->mother_name;
                $student->status = $request->status;
                $student->date_of_birth = $request->date_of_birth;
                $student->roll_no = $request->roll_no;
                $student->present_address = $request->present_address;
                $student->permanant_address = $request->permanant_address;
                $student->gender = $request->gender;
                $student->class_id = $request->class_id;
                $student->department_id = $request->department_id;
                $student->shift = $request->shift;
                $student->session = $request->sassion;
                $student->semester = $request->semester;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/students_photos/', $filename);
                $student->image = $filename;

                $file1 = $request->file('document');
                $extension1 = $file1->getClientOriginalExtension();
                $filename1 = sha1(time()) . '.' . $extension1;
                $file1->move('storage/students_document/', $filename1);
                $student->document = $filename1;

                $student->update();
                return redirect()->route('backend_student_manage')->with('status','student updated successfully');
            }else{
                return back()->with('status','your student photo and student document nothing');
            }
        }elseif ($request->hasFile('image')){
            if (Storage::delete('public/students_photos/'.$student->image)) {
                $student->name = $request->name;
                $student->email = $request->email;
                $student->phone_number = $request->phone_number;
                $student->father_name = $request->father_name;
                $student->mother_name = $request->mother_name;
                $student->status = $request->status;
                $student->date_of_birth = $request->date_of_birth;
                $student->roll_no = $request->roll_no;
                $student->present_address = $request->present_address;
                $student->permanant_address = $request->permanant_address;
                $student->gender = $request->gender;
                $student->class_id = $request->class_id;
                $student->department_id = $request->department_id;
                $student->shift = $request->shift;
                $student->session = $request->sassion;
                $student->semester = $request->semester;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/students_photos/', $filename);
                $student->image = $filename;

                $student->update();
                return redirect()->route('backend_student_manage')->with('status','student updated successfully');
            }else{
                return back()->with('status','your student photo  nothing');
            }

        }elseif ($request->hasFile('document')){
            if (Storage::delete('public/students_document/'.$student->document) ) {
                $student->name = $request->name;
                $student->email = $request->email;
                $student->phone_number = $request->phone_number;
                $student->father_name = $request->father_name;
                $student->mother_name = $request->mother_name;
                $student->status = $request->status;
                $student->date_of_birth = $request->date_of_birth;
                $student->roll_no = $request->roll_no;
                $student->present_address = $request->present_address;
                $student->permanant_address = $request->permanant_address;
                $student->gender = $request->gender;
                $student->class_id = $request->class_id;
                $student->department_id = $request->department_id;
                $student->shift = $request->shift;
                $student->session = $request->sassion;
                $student->semester = $request->semester;

                $file1 = $request->file('document');
                $extension1 = $file1->getClientOriginalExtension();
                $filename1 = sha1(time()) . '.' . $extension1;
                $file1->move('storage/students_document/', $filename1);
                $student->document = $filename1;

                $student->update();
                return redirect()->route('backend_student_manage')->with('status','student updated successfully');
            }else{
                return back()->with('status','your student document nothing');
            }
        } else {
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone_number = $request->phone_number;
            $student->father_name = $request->father_name;
            $student->mother_name = $request->mother_name;
            $student->status = $request->status;
            $student->date_of_birth = $request->date_of_birth;
            $student->roll_no = $request->roll_no;
            $student->present_address = $request->present_address;
            $student->permanant_address = $request->permanant_address;
            $student->gender = $request->gender;
            $student->class_id = $request->class_id;
            $student->department_id = $request->department_id;
            $student->shift = $request->shift;
            $student->session = $request->sassion;
            $student->semester = $request->semester;
            $student->update();
            return redirect()->route('backend_student_manage')->with('status', 'student updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if (Storage::delete('public/students_photos/'.$student->image) && Storage::delete('public/students_document/'.$student->document)){
            $student->delete();
            return redirect()->route('backend_student_manage')->with('status','Your student is deleted');
        }else{
            return back()->with('status','folder is no file here');
        }
    }
}

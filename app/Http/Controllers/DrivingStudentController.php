<?php

namespace App\Http\Controllers;

use App\Driving_Student;
use App\Driving_Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrivingStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $driving_students = Driving_Student::orderBy('id','DESC')->get();
        return view('backend/driving_students.index',compact('driving_students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $driving_courses = Driving_Course::all();
        return view('backend/driving_students.create',compact('driving_courses'));
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
            'email'      => 'nullable | email | unique:drivingStudents,email',
            'phone_number' => 'required | min:11 | max:11 | unique:drivingStudents,phone_number',
            'date_of_birth' => 'required | date',
            'join_date'     => 'required | date',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'image' => 'required | image',
            'gender' => 'required',
            'driving_course_id' => 'required',
            'document' => 'required | image'

        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $name = $first_name.' '.$last_name;

        $driving_student                  = new Driving_Student();
        $driving_student->name            = $name;
        $driving_student->email           = $request->email;
        $driving_student->phone_number    = $request->phone_number;
        $driving_student->father_name     = $request->father_name;
        $driving_student->mother_name     = $request->mother_name;
        $driving_student->status          = $request->status;
        $driving_student->date_of_birth   = $request->date_of_birth;
        $driving_student->join_date       = $request->join_date;
        $driving_student->present_address = $request->present_address;
        $driving_student->permanant_address = $request->permanant_address;
        $driving_student->gender          = $request->gender;
        $driving_student->driving_course_id = $request->driving_course_id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/driving_student_photos/',$filename);
            $driving_student->image = $filename;
        }

        if ($request->hasFile('document')){
            $file1 = $request->file('document');
            $extension1 = $file1->getClientOriginalExtension();
            $filename1 = sha1(time()).'.'.$extension1;
            $file1->move('storage/driving_student_document/',$filename1);
            $driving_student->document = $filename1;
        }
        $driving_student->save();
        return redirect()->route('backend_driving_student_manage')->with('status','driving student added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driving_Student  $driving_Student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $driving_student = Driving_Student::findOrFail($id);
        return view('backend/driving_students.show',compact('driving_student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driving_Student  $driving_Student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $driving_courses = Driving_Course::all();
        $driving_student = Driving_Student::findOrFail($id);
        return view('backend/driving_students.edit',compact('driving_student','driving_courses'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driving_Student  $driving_Student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request,[
            'name'            => 'required | min:3',
            'father_name'       => 'required | min:4 ',
            'mother_name'           => 'required | min:4',
            'status'       => 'required',
            'email'           => "required | email | unique:drivingStudents,email,$id",
            'phone_number'    => "required | min:11 | max:11 | unique:drivingStudents,phone_number,$id",
            'date_of_birth'   => 'required | date',
            'join_date'       => 'required | date',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'image'           => 'nullable | image',
            'gender'          => 'required',
            'driving_course_id' => 'required',
            'document'        => 'nullable | image'


        ]);


        $driving_student = Driving_Student::findOrFail($id);


        if ($request->hasFile('image') && $request->hasFile('document')){
            if (Storage::delete('public/driving_student_photos/'.$driving_student->image) && Storage::delete('public/driving_student_document/'.$driving_student->document) ) {
                $driving_student->name = $request->name;
                $driving_student->email = $request->email;
                $driving_student->phone_number = $request->phone_number;
                $driving_student->father_name = $request->father_name;
                $driving_student->mother_name = $request->mother_name;
                $driving_student->status = $request->status;
                $driving_student->date_of_birth = $request->date_of_birth;
                $driving_student->join_date = $request->join_date;
                $driving_student->present_address = $request->present_address;
                $driving_student->permanant_address = $request->permanant_address;
                $driving_student->gender = $request->gender;
                $driving_student->driving_course_id = $request->driving_course_id;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/driving_student_photos/', $filename);
                $driving_student->image = $filename;

                $file1 = $request->file('document');
                $extension1 = $file1->getClientOriginalExtension();
                $filename1 = sha1(time()) . '.' . $extension1;
                $file1->move('storage/driving_student_document/', $filename1);
                $driving_student->document = $filename1;

                $driving_student->update();
                return redirect()->route('backend_driving_student_manage')->with('status','driving student updated successfully');
            }else{
                return back()->with('status','your driving student photo and driving student document nothing');
            }
        }elseif ($request->hasFile('image')){
            if (Storage::delete('public/driving_student_photos/'.$driving_student->image)) {
                $driving_student->name = $request->name;
                $driving_student->email = $request->email;
                $driving_student->phone_number = $request->phone_number;
                $driving_student->father_name = $request->father_name;
                $driving_student->mother_name = $request->mother_name;
                $driving_student->status = $request->status;
                $driving_student->date_of_birth = $request->date_of_birth;
                $driving_student->join_date = $request->join_date;
                $driving_student->present_address = $request->present_address;
                $driving_student->permanant_address = $request->permanant_address;
                $driving_student->gender = $request->gender;
                $driving_student->driving_course_id = $request->driving_course_id;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/driving_student_photos/', $filename);
                $driving_student->image = $filename;

                $driving_student->update();
                return redirect()->route('backend_driving_student_manage')->with('status','driving student updated successfully');
            }else{
                return back()->with('status','your driving student photo  nothing');
            }

        }elseif ($request->hasFile('document')){
            if (Storage::delete('public/driving_student_document/'.$driving_student->document) ) {
                $driving_student->name = $request->name;
                $driving_student->email = $request->email;
                $driving_student->phone_number = $request->phone_number;
                $driving_student->father_name = $request->father_name;
                $driving_student->mother_name = $request->mother_name;
                $driving_student->status = $request->status;
                $driving_student->date_of_birth = $request->date_of_birth;
                $driving_student->join_date = $request->join_date;
                $driving_student->present_address = $request->present_address;
                $driving_student->permanant_address = $request->permanant_address;
                $driving_student->gender = $request->gender;
                $driving_student->driving_course_id = $request->driving_course_id;

                $file1 = $request->file('document');
                $extension1 = $file1->getClientOriginalExtension();
                $filename1 = sha1(time()) . '.' . $extension1;
                $file1->move('storage/driving_student_document/', $filename1);
                $driving_student->document = $filename1;

                $driving_student->update();
                return redirect()->route('backend_driving_student_manage')->with('status','driving student updated successfully');
            }else{
                return back()->with('status','your driving student document nothing');
            }
        } else {
            $driving_student->name = $request->name;
            $driving_student->email = $request->email;
            $driving_student->phone_number = $request->phone_number;
            $driving_student->father_name = $request->father_name;
            $driving_student->mother_name = $request->mother_name;
            $driving_student->status = $request->status;
            $driving_student->date_of_birth = $request->date_of_birth;
            $driving_student->join_date = $request->join_date;
            $driving_student->present_address = $request->present_address;
            $driving_student->permanant_address = $request->permanant_address;
            $driving_student->gender = $request->gender;
            $driving_student->driving_course_id = $request->driving_course_id;
            $driving_student->update();
            return redirect()->route('backend_driving_student_manage')->with('status', 'driving student updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driving_Student  $driving_Student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $driving_student = Driving_Student::findOrFail($id);

        if (Storage::delete('public/driving_student_photos/'.$driving_student->image) && Storage::delete('public/driving_student_document/'.$driving_student->document)){
            $driving_student->delete();
            return redirect()->route('backend_driving_student_manage')->with('status','Your driving student is deleted');
        }else{
            return back()->with('status','folder is no file here');
        }
    }
}

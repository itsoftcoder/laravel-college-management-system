<?php

namespace App\Http\Controllers;

use App\Driving_Course;
use App\Driving_Teacher;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrivingTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driving_teachers = Driving_Teacher::orderBy('id','DESC')->get();
        return view('backend/driving_teachers.index',compact('driving_teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driving_courses = Driving_Course::all();
        return view('backend/driving_teachers.create',compact('driving_courses'));
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
            'experience'  => 'required | min:4 ',
            'skill'      => 'required | min:4',
            'work_hour'        => 'required | min:2',
            'email'      => 'required | email | unique:drivingTeachers,email',
            'phone_number' => 'required | min:11 | max:11 | unique:drivingTeachers,phone_number',
            'salary'       => 'required | min:4',
            'date_of_birth' => 'required | date',
            'join_date'     => 'required | date',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'about' => 'required | min:10 | max:2000',
            'image' => 'required | image',
            'gender' => 'required',
            'driving_course_id' => 'required',
            'document' => 'required | image'

        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $name = $first_name.' '.$last_name;
        $driving_teacher                  = new Driving_Teacher();
        $driving_teacher->name            = $name;
        $driving_teacher->email           = $request->email;
        $driving_teacher->phone_number    = $request->phone_number;
        $driving_teacher->experience       = $request->experience;
        $driving_teacher->skills          = $request->skill;
        $driving_teacher->salary          = $request->salary;
        $driving_teacher->date_of_birth   = $request->date_of_birth;
        $driving_teacher->join_date       = $request->join_date;
        $driving_teacher->work_hour       = $request->work_hour;
        $driving_teacher->present_address = $request->present_address;
        $driving_teacher->permanant_address = $request->permanant_address;
        $driving_teacher->about           = $request->about;
        $driving_teacher->gender          = $request->gender;
        $driving_teacher->driving_course_id = $request->driving_course_id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/driving_teachers_photos/',$filename);
            $driving_teacher->image = $filename;
        }

        if ($request->hasFile('document')){
            $file1 = $request->file('document');
            $extension1 = $file1->getClientOriginalExtension();
            $filename1 = sha1(time()).'.'.$extension1;
            $file1->move('storage/driving_teachers_document/',$filename1);
            $driving_teacher->document = $filename1;
        }
        $driving_teacher->save();
        return redirect()->route('backend_driving_teacher_manage')->with('status','driving teacher added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driving_Teacher  $driving_Teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driving_teacher = Driving_Teacher::findOrFail($id);
        return view('backend/driving_teachers.show',compact('driving_teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driving_Teacher  $driving_Teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driving_courses = Driving_Course::all();
        $driving_teacher = Driving_Teacher::findOrFail($id);
        return view('backend/driving_teachers.edit',compact('driving_teacher','driving_courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driving_Teacher  $driving_Teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'            => 'required | min:3',
            'experience'       => 'required | min:4 ',
            'skill'           => 'required | min:4',
            'work_hour'       => 'required | min:1',
            'email'           => "required | email | unique:drivingTeachers,email,$id",
            'phone_number'    => "required | min:11 | max:11 | unique:drivingTeachers,phone_number,$id",
            'salary'          => 'required | min:4',
            'date_of_birth'   => 'required | date',
            'join_date'       => 'required | date',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'about'           => 'required | min:10 | max:2000',
            'image'           => 'nullable | image',
            'gender'          => 'required',
            'driving_course_id' => 'required',
            'document'        => 'nullable | image'


        ]);


        $driving_teacher = Driving_Teacher::findOrFail($id);


        if ($request->hasFile('image') && $request->hasFile('document')){
            if (Storage::delete('public/driving_teachers_photos/'.$driving_teacher->image) && Storage::delete('public/driving_teachers_document/'.$driving_teacher->document) ) {
                $driving_teacher->name = $request->name;
                $driving_teacher->email = $request->email;
                $driving_teacher->phone_number = $request->phone_number;
                $driving_teacher->experience = $request->experience;
                $driving_teacher->skills = $request->skill;
                $driving_teacher->salary = $request->salary;
                $driving_teacher->date_of_birth = $request->date_of_birth;
                $driving_teacher->join_date = $request->join_date;
                $driving_teacher->work_hour = $request->work_hour;
                $driving_teacher->present_address = $request->present_address;
                $driving_teacher->permanant_address = $request->permanant_address;
                $driving_teacher->about = $request->about;
                $driving_teacher->gender = $request->gender;
                $driving_teacher->driving_course_id = $request->driving_course_id;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/driving_teachers_photos/', $filename);
                $driving_teacher->image = $filename;

                $file1 = $request->file('document');
                $extension1 = $file1->getClientOriginalExtension();
                $filename1 = sha1(time()) . '.' . $extension1;
                $file1->move('storage/driving_teachers_document/', $filename1);
                $driving_teacher->document = $filename1;

                $driving_teacher->update();
                return redirect()->route('backend_driving_teacher_manage')->with('status','driving teacher updated successfully');
            }else{
                return back()->with('status','your driving teacher photo and driving teacher document nothing');
            }
        }elseif ($request->hasFile('image')){
            if (Storage::delete('public/driving_teachers_photos/'.$driving_teacher->image)) {
                $driving_teacher->name = $request->name;
                $driving_teacher->email = $request->email;
                $driving_teacher->phone_number = $request->phone_number;
                $driving_teacher->experience = $request->experience;
                $driving_teacher->skills = $request->skill;
                $driving_teacher->salary = $request->salary;
                $driving_teacher->date_of_birth = $request->date_of_birth;
                $driving_teacher->join_date = $request->join_date;
                $driving_teacher->work_hour = $request->work_hour;
                $driving_teacher->present_address = $request->present_address;
                $driving_teacher->permanant_address = $request->permanant_address;
                $driving_teacher->about = $request->about;
                $driving_teacher->gender = $request->gender;
                $driving_teacher->driving_course_id = $request->driving_course_id;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/driving_teachers_photos/', $filename);
                $driving_teacher->image = $filename;

                $driving_teacher->update();
                return redirect()->route('backend_driving_teacher_manage')->with('status','driving teacher updated successfully');
            }else{
                return back()->with('status','your driving teacher photo  nothing');
            }

        }elseif ($request->hasFile('document')){
            if (Storage::delete('public/driving_teachers_document/'.$driving_teacher->document) ) {
                $driving_teacher->name = $request->name;
                $driving_teacher->email = $request->email;
                $driving_teacher->phone_number = $request->phone_number;
                $driving_teacher->experience = $request->experience;
                $driving_teacher->skills = $request->skill;
                $driving_teacher->salary = $request->salary;
                $driving_teacher->date_of_birth = $request->date_of_birth;
                $driving_teacher->join_date = $request->join_date;
                $driving_teacher->work_hour = $request->work_hour;
                $driving_teacher->present_address = $request->present_address;
                $driving_teacher->permanant_address = $request->permanant_address;
                $driving_teacher->about = $request->about;
                $driving_teacher->gender = $request->gender;
                $driving_teacher->driving_course_id = $request->driving_course_id;

                $file1 = $request->file('document');
                $extension1 = $file1->getClientOriginalExtension();
                $filename1 = sha1(time()) . '.' . $extension1;
                $file1->move('storage/driving_teachers_document/', $filename1);
                $driving_teacher->document = $filename1;

                $driving_teacher->update();
                return redirect()->route('backend_driving_teacher_manage')->with('status','driving teacher updated successfully');
            }else{
                return back()->with('status','your driving teacher document nothing');
            }
        } else {
            $driving_teacher->name = $request->name;
            $driving_teacher->email = $request->email;
            $driving_teacher->phone_number = $request->phone_number;
            $driving_teacher->experience = $request->experience;
            $driving_teacher->skills = $request->skill;
            $driving_teacher->salary = $request->salary;
            $driving_teacher->date_of_birth = $request->date_of_birth;
            $driving_teacher->join_date = $request->join_date;
            $driving_teacher->work_hour = $request->work_hour;
            $driving_teacher->present_address = $request->present_address;
            $driving_teacher->permanant_address = $request->permanant_address;
            $driving_teacher->about = $request->about;
            $driving_teacher->gender = $request->gender;
            $driving_teacher->driving_course_id = $request->driving_course_id;
            $driving_teacher->update();
            return redirect()->route('backend_driving_teacher_manage')->with('status', 'driving teacher updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driving_Teacher  $driving_Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driving_teacher = Driving_Teacher::findOrFail($id);

        if (Storage::delete('public/driving_teachers_photos/'.$driving_teacher->image) && Storage::delete('public/driving_teachers_document/'.$driving_teacher->document)){
            $driving_teacher->delete();
            return redirect()->route('backend_driving_teacher_manage')->with('status','Your driving teacher is deleted');
        }else{
            return back()->with('status','folder is no file here');
        }
    }
}

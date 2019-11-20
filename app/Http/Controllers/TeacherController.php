<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id','DESC')->get();
        return view('backend/teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/teachers.create');
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
            'profetion'  => 'required | min:4 ',
            'skill'      => 'required | min:4',
            'age'        => 'required | min:2',
            'email'      => 'required | email | unique:teachers,email',
            'phone_number' => 'required | min:11 | max:11 | unique:teachers,phone_number',
            'salary'       => 'required | min:4',
            'date_of_birth' => 'required | date',
            'join_date'     => 'required | date',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'about' => 'required | min:10 | max:2000',
            'image' => 'required | image',
            'gender' => 'required'

        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $name = $first_name.' '.$last_name;
        $teacher = new Teacher();
        $teacher->name = $name;
        $teacher->email = $request->email;
        $teacher->phone_number = $request->phone_number;
        $teacher->profetion = $request->profetion;
        $teacher->skills = $request->skill;
        $teacher->salary = $request->salary;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->join_date = $request->join_date;
        $teacher->age = $request->age;
        $teacher->present_address = $request->present_address;
        $teacher->permanant_address = $request->permanant_address;
        $teacher->about = $request->about;
        $teacher->gender = $request->gender;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/teachers_photos/',$filename);
            $teacher->image = $filename;
        }
        $teacher->save();
        return redirect()->route('backend_teacher_manage')->with('status','teacher added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend/teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend/teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required | min:3',
            'profetion'  => 'required | min:4 ',
            'skill'      => 'required | min:4',
            'age'        => 'required | min:2',
            'email'      => "required | email | unique:teachers,email,$id",
            'phone_number' => "required | min:11 | max:11 | unique:teachers,phone_number,$id",
            'salary'       => 'required | min:4',
            'date_of_birth' => 'required | date',
            'join_date'     => 'required | date',
            'present_address' => 'required | min:4',
            'permanant_address' => 'required | min:4',
            'about' => 'required | min:10 | max:2000',
            'image' => 'nullable | image',
            'gender' => 'required'

        ]);


        $teacher = Teacher::findOrFail($id);


        if ($request->hasFile('image')){
            if (Storage::delete('public/teachers_photos/'.$teacher->image)) {
                $teacher->name = $request->name;
                $teacher->email = $request->email;
                $teacher->phone_number = $request->phone_number;
                $teacher->profetion = $request->profetion;
                $teacher->skills = $request->skill;
                $teacher->salary = $request->salary;
                $teacher->date_of_birth = $request->date_of_birth;
                $teacher->join_date = $request->join_date;
                $teacher->age = $request->age;
                $teacher->present_address = $request->present_address;
                $teacher->permanant_address = $request->permanant_address;
                $teacher->about = $request->about;
                $teacher->gender = $request->gender;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/teachers_photos/', $filename);
                $teacher->image = $filename;

                $teacher->update();
                return redirect()->route('backend_teacher_manage')->with('status','teacher updated successfully');
            }else{
                return back()->with('status','your teachers_photo nothing');
            }
        }else {
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->phone_number = $request->phone_number;
            $teacher->profetion = $request->profetion;
            $teacher->skills = $request->skill;
            $teacher->salary = $request->salary;
            $teacher->date_of_birth = $request->date_of_birth;
            $teacher->join_date = $request->join_date;
            $teacher->age = $request->age;
            $teacher->present_address = $request->present_address;
            $teacher->permanant_address = $request->permanant_address;
            $teacher->about = $request->about;
            $teacher->gender = $request->gender;
            $teacher->update();
            return redirect()->route('backend_teacher_manage')->with('status', 'teacher updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if (Storage::delete('public/teachers_photos/'.$teacher->image)){
            $teacher->delete();
            return redirect()->route('backend_teacher_manage')->with('status','Your teacher is deleted');
        }else{
            return back()->with('status','folder is no file here');
        }
    }
}

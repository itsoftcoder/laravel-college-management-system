<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Department;
use App\Notice;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('id','DESC')->get();
            return view('backend/departments/index',compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/departments.create');
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
            'name'         => 'required | min:3 | unique:departments,name',
            'code'         => 'required | min:2 | unique:departments,code',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->code = $request->code;
        $department->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/department_photos/',$filename);
            $department->image = $filename;
        }else{
            return $request;
            $department->image = '';
        }

        $department->save();
        return redirect()->route('backend_department_manage')->with('status','your department create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('backend/departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => "required | min:3 | unique:departments,name,$id",
            'code'         => "required | min:2 | unique:departments,code,$id",
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $department = Department::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/department_photos/'.$department->image)) {
                $department->name = $request->name;
                $department->code = $request->code;
                $department->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/department_photos/', $filename);
                $department->image = $filename;
                $department->update();
                return redirect()->route('backend_department_manage')->with('status','Your department update succesfully');

            }else{
                return "your folder is no file here";
            }
        }else{
            $department->name = $request->name;
            $department->code = $request->code;
            $department->description = $request->description;
            $department->update();
            return redirect()->route('backend_department_manage')->with('status','Your department update succesfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $notices = Notice::where('department_id',$id)->get();
        $students = Student::where('department_id',$id)->get();

        foreach ($students as $student){}
        foreach ($notices as $notice){}

        if(!empty($notice) && !empty($student)){

            for ($i = 0; $i < $notices->count(); $i++) {

                if (Storage::delete('public/notices_photos/'.$notices[$i]->document)){
                    $notices[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            for ($i = 0; $i < $students->count(); $i++) {

                if (Storage::delete('public/students_photos/'.$students[$i]->image) && Storage::delete('public/students_document/'.$students[$i]->document)){
                    $students[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }


            if (Storage::delete('public/department_photos/'.$department->image)) {
                $department->delete();
                return redirect()->route('backend_department_manage')->with('status', 'Your department and this department notices are deleted');
            } else {
                return back();
            }

        }elseif(!empty($notice)) {

            for ($i = 0; $i < $notices->count(); $i++) {

                if (Storage::delete('public/notices_photos/'.$notices[$i]->document)){
                    $notices[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/department_photos/'.$department->image)) {
                $department->delete();
                return redirect()->route('backend_department_manage')->with('status', 'Your department and this department notices are deleted');
            } else {
                return back();
            }

        }elseif (!empty($student)){

            for ($i = 0; $i < $students->count(); $i++) {

                if (Storage::delete('public/students_photos/'.$students[$i]->image) && Storage::delete('public/students_document/'.$students[$i]->document)){
                    $students[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/department_photos/'.$department->image)) {
                $department->delete();
                return redirect()->route('backend_department_manage')->with('status', 'Your department and this department students are deleted');
            } else {
                return back()->with('status','something is error');
            }


        } else{
            if (Storage::delete('public/department_photos/'.$department->image)) {
                $department->delete();
                return redirect()->route('backend_department_manage')->with('status', 'Your class is deleted');
            } else {
                return "folder is no file here";
            }
        }
    }
}

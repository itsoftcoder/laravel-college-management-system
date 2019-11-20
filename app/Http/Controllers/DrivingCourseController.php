<?php

namespace App\Http\Controllers;

use App\Driving_Course;
use App\Driving_Student;
use App\Driving_Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrivingCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driving_courses = Driving_Course::orderBy('id','DESC')->get();
        return view('backend/driving_courses.index',compact('driving_courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/driving_courses.create');
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
            'name'         => 'required | min:3 | unique:drivingCourses,name',
            'manager_name'     => 'required | min:3',
            'course_month'     => 'required',
            'description'  => 'required | max:200',
            'establish_date'        => 'required | date'
        ]);

        $driving_course = new Driving_Course();
        $driving_course->name = $request->name;
        $driving_course->manager_name = $request->manager_name;
        $driving_course->course_month = $request->course_month;
        $driving_course->description = $request->description;
        $driving_course->establish_date = $request->establish_date;

        $driving_course->save();
        return redirect()->route('backend_driving_course_manage')->with('status','your driving course create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driving_Course  $driving_Course
     * @return \Illuminate\Http\Response
     */
    public function show(Driving_Course $driving_Course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driving_Course  $driving_Course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driving_course = Driving_Course::findOrFail($id);
        return view('backend/driving_courses.edit',compact('driving_course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driving_Course  $driving_Course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => "required | min:3 | unique:drivingCourses,name,$id",
            'manager_name'     => 'required | min:3',
            'course_month'     => 'required',
            'description'  => 'required | max:200',
            'establish_date'        => 'required'
        ]);

        $driving_course = Driving_Course::findOrFail($id);

            $driving_course->name = $request->name;
            $driving_course->manager_name = $request->manager_name;
            $driving_course->course_month = $request->course_month;
            $driving_course->establish_date = $request->establish_date;
            $driving_course->description = $request->description;
            $driving_course->update();
            return redirect()->route('backend_driving_course_manage')->with('status','Your driving course update succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driving_Course  $driving_Course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driving_course = Driving_Course::findOrFail($id);
        $driving_students = Driving_Student::where('driving_course_id',$id)->get();
        $driving_teachers = Driving_Teacher::where('driving_course_id',$id)->get();

        foreach ($driving_students as $driving_student){}
        foreach ($driving_teachers as $driving_teacher){}

        if (!empty($driving_student) && !empty($driving_teacher)){

            for ($i = 0; $i < $driving_students->count(); $i++) {

                if (Storage::delete('public/driving_student_photos/'.$driving_students[$i]->image) && Storage::delete('public/driving_student_document/'.$driving_students[$i]->document)){
                    $driving_students[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }

            }

            for ($i = 0; $i < $driving_teachers->count(); $i++) {

                if (Storage::delete('public/driving_teachers_photos/'.$driving_teachers[$i]->image) && Storage::delete('public/driving_teachers_document/'.$driving_teachers[$i]->document)){
                    $driving_teachers[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }

            }

            $driving_course->delete();

            return redirect()->route('backend_driving_course_manage')->with('status','Your driving Course, This Driving course teachers and this driving course students are deleted');

        }elseif (!empty($driving_student)){

            for ($i = 0; $i < $driving_students->count(); $i++) {

                if (Storage::delete('public/driving_student_photos/'.$driving_students[$i]->image) && Storage::delete('public/driving_student_document/'.$driving_students[$i]->document)){
                    $driving_students[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }

            }

            $driving_course->delete();

            return redirect()->route('backend_driving_course_manage')->with('status','Your driving Course and this driving course students are deleted');

        }elseif (!empty($driving_teacher)){

            for ($i = 0; $i < $driving_teachers->count(); $i++) {

                if (Storage::delete('public/driving_teachers_photos/'.$driving_teachers[$i]->image) && Storage::delete('public/driving_teachers_document/'.$driving_teachers[$i]->document)){
                    $driving_teachers[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }

            }

            $driving_course->delete();

            return redirect()->route('backend_driving_course_manage')->with('status','Your driving Course and This Driving course teachers are deleted');

        }else {

            $driving_course->delete();
            return redirect()->route('backend_driving_course_manage')->with('status','Your driving course is deleted');
        }
    }
}

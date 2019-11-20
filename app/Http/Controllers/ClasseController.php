<?php

namespace App\Http\Controllers;

use App\Book;
use App\Classe;
use App\Notice;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::orderBy('id','DESC')->get();
        return view('backend/classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/classes.create');
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
            'name'         => 'required | min:3 | unique:classes,name',
            'code'         => 'required | min:2 | unique:classes,code',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $class = new Classe();
        $class->name = $request->name;
        $class->code = $request->code;
        $class->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/classes_photos/',$filename);
            $class->image = $filename;
        }

        $class->save();
        return redirect()->route('backend_class_manage')->with('status','your class create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classe::findOrFail($id);
        return view('backend/classes.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => "required | min:3 | unique:classes,name,$id",
            'code'         => "required | min:2 | unique:classes,code,$id",
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $class = Classe::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/classes_photos/'.$class->image)) {
                $class->name = $request->name;
                $class->code = $request->code;
                $class->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/classes_photos/', $filename);
                $class->image = $filename;
                $class->update();
                return redirect()->route('backend_class_manage')->with('status','Your class update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $class->name = $request->name;
            $class->code = $request->code;
            $class->description = $request->description;
            $class->update();
            return redirect()->route('backend_class_manage')->with('status','Your class update succesfully');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $class = Classe::findOrFail($id);
         $notices = Notice::where('class_id',$id)->get();
         $books = Book::where('class_id',$id)->get();
         $students = Student::where('class_id',$id)->get();

         foreach ($students as $student){}

         foreach ($books as $book){}

         foreach ($notices as $notice){}

         if(!empty($student) && !empty($book) && !empty($notice)){

             for ($i = 0; $i < $students->count(); $i++) {

                 if (Storage::delete('public/students_photos/'.$students[$i]->image) && Storage::delete('public/students_document/'.$students[$i]->document)){
                     $students[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             for ($i = 0; $i < $books->count(); $i++) {

                 if (Storage::delete('public/books_photos/'.$books[$i]->image)){
                     $books[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             for ($i = 0; $i < $notices->count(); $i++) {

                 if (Storage::delete('public/notices_photos/'.$notices[$i]->document)){
                     $notices[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class , this class students , this class books and this class notices are deleted');
             } else {
                 return back()->with('status','something is error');
             }

         }elseif (!empty($student) && !empty($book)){

             for ($i = 0; $i < $students->count(); $i++) {

                 if (Storage::delete('public/students_photos/'.$students[$i]->image) && Storage::delete('public/students_document/'.$students[$i]->document)){
                     $students[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             for ($i = 0; $i < $books->count(); $i++) {

                 if (Storage::delete('public/books_photos/'.$books[$i]->image)){
                     $books[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class , this class students and this class books are deleted');
             } else {
                 return back()->with('status','something is error');
             }

         }elseif (!empty($student) && !empty($notice)){

             for ($i = 0; $i < $students->count(); $i++) {

                 if (Storage::delete('public/students_photos/'.$students[$i]->image) && Storage::delete('public/students_document/'.$students[$i]->document)){
                     $students[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             for ($i = 0; $i < $notices->count(); $i++) {

                 if (Storage::delete('public/notices_photos/'.$notices[$i]->document)){
                     $notices[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class , this class students and this class notices are deleted');
             } else {
                 return back()->with('status','something is error');
             }

         }elseif (!empty($book) && !empty($notice)){

             for ($i = 0; $i < $books->count(); $i++) {

                 if (Storage::delete('public/books_photos/'.$books[$i]->image)){
                     $books[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             for ($i = 0; $i < $notices->count(); $i++) {

                 if (Storage::delete('public/notices_photos/'.$notices[$i]->document)){
                     $notices[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class , this class notices and this class books are deleted');
             } else {
                 return back()->with('status','something is error');
             }

         }elseif(!empty($notice)) {

             for ($i = 0; $i < $notices->count(); $i++) {

                 if (Storage::delete('public/notices_photos/'.$notices[$i]->document)){
                     $notices[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }

             }


             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class and this class notices are deleted');
             } else {
                 return back()->with('status','something is error');
             }

         }elseif (!empty($book)){

             for ($i = 0; $i < $books->count(); $i++) {

                 if (Storage::delete('public/books_photos/'.$books[$i]->image)){
                     $books[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }

             }


             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class and this class books are deleted');
             } else {
                 return back()->with('status','something is error');
             }


         }elseif (!empty($student)){

             for ($i = 0; $i < $students->count(); $i++) {

                 if (Storage::delete('public/students_photos/'.$students[$i]->image) && Storage::delete('public/students_document/'.$students[$i]->document)){
                     $students[$i]->delete();
                 }else{
                     return back()->with('status','something is error');
                 }
             }

             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class and this class students are deleted');
             } else {
                 return back()->with('status','something is error');
             }


         } else{
             if (Storage::delete('public/classes_photos/'.$class->image)) {
                 $class->delete();
                 return redirect()->route('backend_class_manage')->with('status', 'Your class is deleted');
             } else {
                 return "folder is no file here";
             }
         }
    }
}

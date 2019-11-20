<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Program;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::orderBy('id','DESC')->get();
        return view('backend/programs.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/programs.create');
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
            'name'         => 'required | min:3 | unique:programs,name',
            'start_time'     => 'required',
            'end_time'     => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $program = new Program();
        $program->name = $request->name;
        $program->start_time = $request->start_time;
        $program->end_time = $request->end_time;
        $program->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/programs_photos/',$filename);
            $program->image = $filename;
        }

        $program->save();
        return redirect()->route('backend_program_manage')->with('status','your program create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('backend/programs.edit',compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => "required | min:3 | unique:programs,name,$id",
            'start_time'     => 'required | date',
            'end_time'     => 'required | date',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $program = Program::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/programs_photos/'.$program->image)) {
                $program->name = $request->name;
                $program->start_time = $request->start_time;
                $program->end_time = $request->end_time;
                $program->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/programs_photos/', $filename);
                $program->image = $filename;
                $program->update();
                return redirect()->route('backend_program_manage')->with('status','Your program update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $program->name = $request->name;
            $program->start_time = $request->start_time;
            $program->end_time = $request->end_time;
            $program->description = $request->description;
            $program->update();
            return redirect()->route('backend_program_manage')->with('status','Your program update succesfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $photos = Photo::where('program_id',$id)->get();
        $videos = Video::where('program_id',$id)->get();

        foreach ($photos as $photo){}
        foreach ($videos as $video){}

        if (!empty($photo) && !empty($video)){

            for ($i = 0; $i < $photos->count(); $i++){
                if (Storage::delete('public/photos/'.$photos[$i]->image)){
                    $photos[$i]->delete();
                }else{
                    return back()->with('status','something id error');
                }
            }

            for ($j = 0; $j < $videos->count(); $j++){
                if (Storage::delete('public/videos/'.$videos[$j]->video)){
                    $videos[$j]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/programs_photos/'.$program->image)) {
                $program->delete();
                return redirect()->route('backend_program_manage')->with('status', 'Your program , this progrma photos and this program videos are deleted');
            } else {
                return "folder is no file here";
            }

        }elseif (!empty($photo)){

            for ($i = 0; $i < $photos->count(); $i++){
                if (Storage::delete('public/photos/'.$photos[$i]->image)){
                    $photos[$i]->delete();
                }else{
                    return back()->with('status','something id error');
                }
            }

            if (Storage::delete('public/programs_photos/'.$program->image)) {
                $program->delete();
                return redirect()->route('backend_program_manage')->with('status', 'Your program and this program photos are deleted');
            } else {
                return "folder is no file here";
            }

        }elseif (!empty($video)){
            for ($i = 0; $i < $videos->count(); $i++){
                if (Storage::delete('public/videos/'.$videos[$i]->video)){
                    $videos[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/programs_photos/'.$program->image)) {
                $program->delete();
                return redirect()->route('backend_program_manage')->with('status', 'Your program and this program videos are deleted');
            } else {
                return "folder is no file here";
            }

        }else {

            if (Storage::delete('public/programs_photos/'.$program->image)) {
                $program->delete();
                return redirect()->route('backend_program_manage')->with('status', 'Your program is deleted');
            } else {
                return "folder is no file here";
            }
        }
    }
}

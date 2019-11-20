<?php

namespace App\Http\Controllers;

use App\Lab;
use App\Photo;
use App\Room;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = Lab::orderBy('id','DESC')->get();
        return view('backend/labs.index',compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/labs.create');
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
            'name'         => 'required | min:3 | unique:labs,name',
            'capacity'     => 'required | min:2',
            'quantity'     => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $lab = new Lab();
        $lab->name = $request->name;
        $lab->capacity = $request->capacity;
        $lab->quantity = $request->quantity;
        $lab->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/labs_photos/',$filename);
            $lab->image = $filename;
        }

        $lab->save();
        return redirect()->route('backend_lab_manage')->with('status','your lab create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        return view('backend/labs.edit',compact('lab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => "required | min:3 | unique:labs,name,$id",
            'capacity'     => 'required | min:2',
            'quantity'     => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $lab = Lab::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->name = $request->name;
                $lab->capacity = $request->capacity;
                $lab->quantity = $request->quantity;
                $lab->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()). '.' . $extension;
                $file->move('storage/labs_photos/', $filename);
                $lab->image = $filename;
                $lab->update();
                return redirect()->route('backend_lab_manage')->with('status','Your lab update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $lab->name = $request->name;
            $lab->capacity = $request->capacity;
            $lab->quantity = $request->quantity;
            $lab->description = $request->description;
            $lab->update();
            return redirect()->route('backend_lab_manage')->with('status','Your lab update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);

        $rooms = Room::where('lab_id',$id)->get();
        $photos = Photo::where('lab_id',$id)->get();
        $videos = Video::where('lab_id',$id)->get();

        foreach ($rooms as $room){}
        foreach ($photos as $photo){}
        foreach ($videos as $video){}

        if (!empty($room) && !empty($photo) && !empty($video)){

            for ($i = 0; $i < $rooms->count(); $i++){
                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            for ($i = 0; $i < $photos->count(); $i++){
                if (Storage::delete('public/photos/'.$photos[$i]->image)){
                    $photos[$i]->delete();
                }else{
                    return back()->with('status','something id error');
                }
            }

            for ($i = 0; $i < $videos->count(); $i++){
                if (Storage::delete('public/videos/'.$videos[$i]->video)){
                    $videos[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab , this lab photos ,this lab videos and this lab rooms are deleted');
            } else {
                return back()->with('status','something is error');
            }

        }elseif (!empty($room) && !empty($photo)){

            for ($i = 0; $i < $rooms->count(); $i++){
                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            for ($i = 0; $i < $photos->count(); $i++){
                if (Storage::delete('public/photos/'.$photos[$i]->image)){
                    $photos[$i]->delete();
                }else{
                    return back()->with('status','something id error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab , this lab photos and this lab rooms are deleted');
            } else {
                return back()->with('status','something is error');
            }

        }elseif (!empty($room) && !empty($video)){

            for ($i = 0; $i < $rooms->count(); $i++){
                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            for ($i = 0; $i < $videos->count(); $i++){
                if (Storage::delete('public/videos/'.$videos[$i]->video)){
                    $videos[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab , this lab videos and this lab rooms are deleted');
            } else {
                return back()->with('status','something is error');
            }

        }elseif (!empty($photo) && !empty($video)){

            for ($i = 0; $i < $photos->count(); $i++){
                if (Storage::delete('public/photos/'.$photos[$i]->image)){
                    $photos[$i]->delete();
                }else{
                    return back()->with('status','something id error');
                }
            }

            for ($i = 0; $i < $videos->count(); $i++){
                if (Storage::delete('public/videos/'.$videos[$i]->video)){
                    $videos[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab , this lab videos and this lab photos are deleted');
            } else {
                return back()->with('status','something is error');
            }

        }elseif (!empty($room)){

            for ($i = 0; $i < $rooms->count(); $i++){
                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab and this lab rooms are deleted');
            } else {
                return back()->with('status','something is error');
            }

        }elseif (!empty($photo)){

            for ($i = 0; $i < $photos->count(); $i++){
                if (Storage::delete('public/photos/'.$photos[$i]->image)){
                    $photos[$i]->delete();
                }else{
                    return back()->with('status','something id error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab and this lab photos are deleted');
            } else {
                return back()->with('status','something is error');
            }


        }elseif (!empty($video)){

            for ($i = 0; $i < $videos->count(); $i++){
                if (Storage::delete('public/videos/'.$videos[$i]->video)){
                    $videos[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab and this lab videos are deleted');
            } else {
                return back()->with('status','something is error');
            }

        }else {

            if (Storage::delete('public/labs_photos/'.$lab->image)) {
                $lab->delete();
                return redirect()->route('backend_lab_manage')->with('status', 'Your lab is deleted');
            } else {
                return back()->with('status','something is error');
            }
        }
    }
}

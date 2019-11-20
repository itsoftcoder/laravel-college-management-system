<?php

namespace App\Http\Controllers;

use App\Magazine;
use App\Photo;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = Magazine::orderBy('id','DESC')->get();
        return view('backend/magazines.index',compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/magazines.create');
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
            'name'         => 'required | min:3 | unique:magazines,name',
            'start_time'     => 'required',
            'end_time'     => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $magzine = new Magazine();
        $magzine->name = $request->name;
        $magzine->start_time = $request->start_time;
        $magzine->end_time = $request->end_time;
        $magzine->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/magazines_photos/',$filename);
            $magzine->image = $filename;
        }

        $magzine->save();
        return redirect()->route('backend_magazine_manage')->with('status','your magazine create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('backend/magazines.edit',compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => "required | min:3 | unique:magazines,name,$id",
            'start_time'     => 'required | date',
            'end_time'     => 'required | date',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $magazine = Magazine::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/magazines_photos/'.$magazine->image)) {
                $magazine->name = $request->name;
                $magazine->start_time = $request->start_time;
                $magazine->end_time = $request->end_time;
                $magazine->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/magazines_photos/', $filename);
                $magazine->image = $filename;
                $magazine->update();
                return redirect()->route('backend_magazine_manage')->with('status','Your magazine update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $magazine->name = $request->name;
            $magazine->start_time = $request->start_time;
            $magazine->end_time = $request->end_time;
            $magazine->description = $request->description;
            $magazine->update();
            return redirect()->route('backend_magazine_manage')->with('status','Your magazine update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);
        $photos = Photo::where('magazine_id',$id)->get();
        $videos = Video::where('magazine_id',$id)->get();

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

            if (Storage::delete('public/magazines_photos/'.$magazine->image)) {
                $magazine->delete();
                return redirect()->route('backend_magazine_manage')->with('status', 'Your magazine ,this magazine photos and this magazine videos are deleted');
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

            if (Storage::delete('public/magazines_photos/'.$magazine->image)) {
                $magazine->delete();
                return redirect()->route('backend_magazine_manage')->with('status', 'Your magazine and this magazine photos are deleted');
            } else {
                return "folder is no file here";
            }

        }elseif (!empty($video)){

            for ($j = 0; $j < $videos->count(); $j++){
                if (Storage::delete('public/videos/'.$videos[$j]->video)){
                    $videos[$j]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            if (Storage::delete('public/magazines_photos/'.$magazine->image)) {
                $magazine->delete();
                return redirect()->route('backend_magazine_manage')->with('status', 'Your magazine and this magazine videos are deleted');
            } else {
                return "folder is no file here";
            }

        }else {

            if (Storage::delete('public/magazines_photos/'.$magazine->image)) {
                $magazine->delete();
                return redirect()->route('backend_magazine_manage')->with('status', 'Your magazine is deleted');
            } else {
                return "folder is no file here";
            }
        }
    }
}

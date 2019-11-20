<?php

namespace App\Http\Controllers;

use App\Garden;
use App\Lab;
use App\Magazine;
use App\Notice;
use App\Photo;
use App\Pool;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('id','DESC')->get();
        return view('backend/photos.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $magazines = Magazine::all();
        $programs = Program::all();
        $gardens = Garden::all();
        $labs = Lab::all();
        $pools = Pool::all();
        return view('backend/photos.create',compact('magazines','programs','gardens','labs','pools'));
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
            'name'         => 'required | min:3',
            'magazine_id'        => 'required',
            'program_id'      => 'required',
            'garden_id'    => 'required',
            'lab_id'   => 'required',
            'pool_id'  => 'required',
            'image'        => 'required | image'
        ]);

        $photo = new Photo();
        $photo->name = $request->name;
        $photo->magazine_id = $request->magazine_id;
        $photo->program_id = $request->program_id;
        $photo->garden_id = $request->garden_id;
        $photo->lab_id = $request->lab_id;
        $photo->pool_id = $request->pool_id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/photos/',$filename);
            $photo->image = $filename;
        }

        $photo->save();
        return redirect()->route('backend_photo_manage')->with('status','your photo create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        $magazines = Magazine::all();
        $programs = Program::all();
        $gardens = Garden::all();
        $labs = Lab::all();
        $pools = Pool::all();
        return view('backend/photos.edit',compact('photo','magazines','programs','gardens','labs','pools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'magazine_id'        => 'required',
            'program_id'      => 'required',
            'garden_id'      => 'required',
            'lab_id'      => 'required',
            'pool_id'      => 'required',
            'image'        => 'nullable | image'
        ]);

        $photo = Photo::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/photos/'.$photo->image)) {
                $photo->name = $request->name;
                $photo->magazine_id = $request->magazine_id;
                $photo->program_id = $request->program_id;
                $photo->garden_id = $request->garden_id;
                $photo->lab_id = $request->lab_id;
                $photo->pool_id = $request->pool_id;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/photos/', $filename);
                $photo->image = $filename;
                $photo->update();
                return redirect()->route('backend_photo_manage')->with('status','Your photo update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $photo->name = $request->name;
            $photo->magazine_id = $request->magazine_id;
            $photo->program_id = $request->program_id;
            $photo->garden_id = $request->garden_id;
            $photo->lab_id = $request->lab_id;
            $photo->pool_id = $request->pool_id;
            $photo->update();
            return redirect()->route('backend_photo_manage')->with('status','Your photo update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        if (Storage::delete('public/photos/'.$photo->image)){
            $photo->delete();
            return redirect()->route('backend_photo_manage')->with('status','Your photo is deleted');
        }else{
            return "folder is no file here";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Gest;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gests = Gest::orderBy('id','DESC')->get();
        return view('backend/gests.index',compact('gests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/gests.create');
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
            'skill'        => 'required | min:5',
            'address'      => 'required | min:3',
            'start_date'     => 'required',
            'end_date'     => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $gest = new Gest();
        $gest->name = $request->name;
        $gest->skills = $request->skill;
        $gest->address = $request->address;
        $gest->start_date = $request->start_date;
        $gest->end_date = $request->end_date;
        $gest->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/gests_photos/',$filename);
            $gest->image = $filename;
        }

        $gest->save();
        return redirect()->route('backend_gest_manage')->with('status','your gest create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gest  $gest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gest = Gest::findOrFail($id);
        return view('backend/gests.show',compact('gest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gest  $gest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gest = Gest::findOrFail($id);
        return view('backend/gests.edit',compact('gest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gest  $gest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'skill'        => 'required | min:4',
            'address'      => 'required | min:5',
            'start_date'     => 'required | date',
            'end_date'     => 'required | date',
            'description'  => 'required | max:200',
            'image'        => 'nullable | image'
        ]);

        $gest = Gest::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/gests_photos/'.$gest->image)) {
                $gest->name = $request->name;
                $gest->skills = $request->skill;
                $gest->address = $request->address;
                $gest->start_date = $request->start_date;
                $gest->end_date = $request->end_date;
                $gest->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/gests_photos/', $filename);
                $gest->image = $filename;
                $gest->update();
                return redirect()->route('backend_gest_manage')->with('status','Your gest update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $gest->name = $request->name;
            $gest->skills = $request->skills;
            $gest->address = $request->address;
            $gest->start_date = $request->start_date;
            $gest->end_date = $request->end_date;
            $gest->description = $request->description;
            $gest->update();
            return redirect()->route('backend_gest_manage')->with('status','Your gest update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gest  $gest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gest = Gest::findOrFail($id);

        if (Storage::delete('public/gests_photos/'.$gest->image)){
            $gest->delete();
            return redirect()->route('backend_gest_manage')->with('status','Your gest is deleted');
        }else{
            return "folder is no file here";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Building;
use App\Gest;
use App\Lab;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::orderBy('id','DESC')->get();
        return view('backend/rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        $labs = Lab::all();
        return view('backend/rooms.create',compact('buildings','labs'));
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
            'building_id'        => 'nullable',
            'lab_id'      => 'nullable',
            'length'     => 'required',
            'width'     => 'required',
            'height'  => 'required',
            'image'        => 'required | image'
        ]);

        $room = new Room();
        $room->name = $request->name;
        $room->building_id = $request->building_id;
        $room->lab_id = $request->lab_id;
        $room->length = $request->length;
        $room->width = $request->width;
        $room->height = $request->height;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/rooms_photos/',$filename);
            $room->image = $filename;
        }

        $room->save();
        return redirect()->route('backend_room_manage')->with('status','your room create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('backend/rooms.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $buildings = Building::all();
        $labs = Lab::all();
        return view('backend/rooms.edit',compact('room','buildings','labs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'building_id'        => 'required',
            'lab_id'      => 'required',
            'length'     => 'required',
            'width'     => 'required',
            'height'  => 'required',
            'image'        => 'nullable | image'
        ]);

        $room = Room::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/rooms_photos/'.$room->image)) {
                $room->name = $request->name;
                $room->building_id = $request->building_id;
                $room->lab_id = $request->lab_id;
                $room->length = $request->length;
                $room->width = $request->width;
                $room->height = $request->height;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/rooms_photos/', $filename);
                $room->image = $filename;
                $room->update();
                return redirect()->route('backend_room_manage')->with('status','Your room update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $room->name = $request->name;
            $room->building_id = $request->building_id;
            $room->lab_id = $request->lab_id;
            $room->length = $request->length;
            $room->width = $request->width;
            $room->height = $request->height;
            $room->update();
            return redirect()->route('backend_room_manage')->with('status','Your room update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        if (Storage::delete('public/rooms_photos/'.$room->image)){
            $room->delete();
            return redirect()->route('backend_room_manage')->with('status','Your room is deleted');
        }else{
            return "folder is no file here";
        }
    }
}

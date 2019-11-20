<?php

namespace App\Http\Controllers;

use App\Building;
use App\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels = Hostel::orderBy('id','DESC')->get();
        return view('backend/hostels.index',compact('hostels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        return view('backend/hostels.create',compact('buildings'));
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
            'building_id'         => 'required',
            'description'  => 'required | max:200'
        ]);

        $hostel = new Hostel();
        $hostel->name = $request->name;
        $hostel->building_id = $request->building_id;
        $hostel->description = $request->description;

        $hostel->save();
        return redirect()->route('backend_hostel_manage')->with('status','your hostel create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hostel = Hostel::findOrFail($id);
        $buildings = Building::all();
        return view('backend/hostels.edit',compact('hostel','buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'building_id'         => 'required',
            'description'  => 'required | max:200',
        ]);

        $hostel = Hostel::findOrFail($id);

            $hostel->name = $request->name;
            $hostel->building_id = $request->building_id;
            $hostel->description = $request->description;
            $hostel->update();
            return redirect()->route('backend_hostel_manage')->with('status','Your hostel update succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hostel = Hostel::findOrFail($id);

            $hostel->delete();
            return redirect()->route('backend_hostel_manage')->with('status','Your hostel is deleted');

    }
}

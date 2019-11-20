<?php

namespace App\Http\Controllers;

use App\Garden;
use App\Photo;
use App\Pool;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pools = Pool::orderBy('id','DESC')->get();
        return view('backend/pools.index',compact('pools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pools.create');
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
            'capacity'         => 'required | min:2',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $pool = new Pool();
        $pool->name = $request->name;
        $pool->capacity = $request->capacity;
        $pool->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/pools_photos/',$filename);
            $pool->image = $filename;
        }

        $pool->save();
        return redirect()->route('backend_pool_manage')->with('status','your pool create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function show(Pool $pool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pool = Pool::findOrFail($id);
        return view('backend/pools.edit',compact('pool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'capacity'         => 'required | min:2',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $pool = Pool::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/pools_photos/'.$pool->image)) {
                $pool->name = $request->name;
                $pool->capacity = $request->capacity;
                $pool->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/pools_photos/', $filename);
                $pool->image = $filename;
                $pool->update();
                return redirect()->route('backend_pool_manage')->with('status','Your pool update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $pool->name = $request->name;
            $pool->capacity = $request->capacity;
            $pool->description = $request->description;
            $pool->update();
            return redirect()->route('backend_pool_manage')->with('status','Your pool update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pool = Pool::findOrFail($id);
        $photos = Photo::where('pool_id',$id)->get();
        $videos = Video::where('pool_id',$id)->get();

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

            if (Storage::delete('public/pools_photos/'.$pool->image)) {
                $pool->delete();
                return redirect()->route('backend_pool_manage')->with('status', 'Your pool , this pool photos and this pool videos are deleted');
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

            if (Storage::delete('public/pools_photos/'.$pool->image)) {
                $pool->delete();
                return redirect()->route('backend_pool_manage')->with('status', 'Your pool and this pool photos are deleted');
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

            if (Storage::delete('public/pools_photos/'.$pool->image)) {
                $pool->delete();
                return redirect()->route('backend_pool_manage')->with('status', 'Your pool and this pool videos is deleted');
            } else {
                return "folder is no file here";
            }

        }else {

            if (Storage::delete('public/pools_photos/'.$pool->image)) {
                $pool->delete();
                return redirect()->route('backend_pool_manage')->with('status', 'Your pool is deleted');
            } else {
                return "folder is no file here";
            }
        }
    }
}

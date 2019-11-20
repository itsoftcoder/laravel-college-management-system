<?php

namespace App\Http\Controllers;

use App\Garden;
use App\Lab;
use App\Magazine;
use App\Pool;
use App\Program;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id','DESC')->get();
        return view('backend/videos.index',compact('videos'));
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
        return view('backend/videos.create',compact('magazines','programs','gardens','labs','pools'));
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
            'video'        => 'required | file'
        ]);

        $video = new Video();
        $video->name = $request->name;
        $video->magazine_id = $request->magazine_id;
        $video->program_id = $request->program_id;
        $video->garden_id = $request->garden_id;
        $video->lab_id = $request->lab_id;
        $video->pool_id = $request->pool_id;

        if ($request->hasFile('video')){
            $file = $request->file('video');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/videos/',$filename);

            $video->video = $filename;
        }

      $video->save();
      return redirect()->route('backend_video_manage')->with('status','your video create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('backend/videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $magazines = Magazine::all();
        $programs = Program::all();
        $gardens = Garden::all();
        $labs = Lab::all();
        $pools = Pool::all();
        return view('backend/videos.edit',compact('video','magazines','programs','gardens','labs','pools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
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
            'video'        => 'nullable | file'
        ]);

        $video = Video::findOrFail($id);

        if ($request->hasFile('video')){
            if (Storage::delete('public/videos/'.$video->video)) {
                $video->name = $request->name;
                $video->magazine_id = $request->magazine_id;
                $video->program_id = $request->program_id;
                $video->garden_id = $request->garden_id;
                $video->lab_id = $request->lab_id;
                $video->pool_id = $request->pool_id;

                $file = $request->file('video');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/videos/', $filename);
                $video->video = $filename;
                $video->update();
                return redirect()->route('backend_video_manage')->with('status','Your video update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $video->name = $request->name;
            $video->magazine_id = $request->magazine_id;
            $video->program_id = $request->program_id;
            $video->garden_id = $request->garden_id;
            $video->lab_id = $request->lab_id;
            $video->pool_id = $request->pool_id;
            $video->update();
            return redirect()->route('backend_video_manage')->with('status','Your video update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        if (Storage::delete('public/videos/'.$video->video)){
            $video->delete();
            return redirect()->route('backend_video_manage')->with('status','Your video is deleted');
        }else{
            return "folder is no file here";
        }
    }
}

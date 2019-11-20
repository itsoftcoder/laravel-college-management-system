<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_Category;
use App\Classe;
use App\Department;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('id','DESC')->get();
        return view('backend/notices.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $classes = Classe::all();
        return view('backend/notices.create',compact('departments','classes'));
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
            'department_id'        => 'required',
            'class_id'      => 'required',
            'image'        => 'required | image'
        ]);

        $notice = new Notice();
        $notice->name = $request->name;
        $notice->department_id = $request->department_id;
        $notice->class_id = $request->class_id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/notices_photos/',$filename);
            $notice->document = $filename;
        }

        $notice->save();
        return redirect()->route('backend_notice_manage')->with('status','your notice create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $notice = Notice::findOrFail($id);
        $departments = Department::all();
        $classes = Classe::all();
        return view('backend/notices.edit',compact('notice','departments','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'department_id'        => 'required',
            'class_id'      => 'required',
            'image'        => 'nullable | image'
        ]);

        $notice = Notice::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/notices_photos/'.$notice->document)) {
                $notice->name = $request->name;
                $notice->department_id = $request->department_id;
                $notice->class_id = $request->class_id;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/notices_photos/', $filename);
                $notice->document = $filename;
                $notice->update();
                return redirect()->route('backend_notice_manage')->with('status','Your notice update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $notice->name = $request->name;
            $notice->department_id = $request->department_id;
            $notice->class_id = $request->class_id;
            $notice->update();
            return redirect()->route('backend_notice_manage')->with('status','Your notice update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);

        if (Storage::delete('public/notices_photos/'.$notice->document)){
            $notice->delete();
            return redirect()->route('backend_notice_manage')->with('status','Your notice is deleted');
        }else{
            return "folder is no file here";
        }
    }
}

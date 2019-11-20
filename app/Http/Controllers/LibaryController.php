<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_Category;
use App\Building;
use App\Libary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libarys = Libary::orderBy('id','DESC')->get();
        return view('backend/liberys.index',compact('libarys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        return view('backend/liberys.create',compact('buildings'));
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
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $libary = new Libary();
        $libary->name = $request->name;
        $libary->building_id = $request->building_id;
        $libary->description = $request->description;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/libarys_photos/',$filename);
            $libary->image = $filename;
        }

        $libary->save();
        return redirect()->route('backend_libary_manage')->with('status','your libary create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libary  $libary
     * @return \Illuminate\Http\Response
     */
    public function show(Libary $libary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libary  $libary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libary = Libary::findOrFail($id);
        $buildings = Building::all();
        return view('backend/liberys.edit',compact('libary','buildings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libary  $libary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'building_id'         => 'required',
            'description'  => 'required | max:200',
            'image'        => 'required | image'
        ]);

        $libary = Libary::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/libarys_photos/'.$libary->image)) {
                $libary->name = $request->name;
                $libary->building_id = $request->building_id;
                $libary->description = $request->description;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/libarys_photos/', $filename);
                $libary->image = $filename;
                $libary->update();
                return redirect()->route('backend_libary_manage')->with('status','Your libary update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $libary->name = $request->name;
            $libary->building_id = $request->building_id;
            $libary->description = $request->description;
            $libary->update();
            return redirect()->route('backend_libary_manage')->with('status','Your libary update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libary  $libary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libary = Libary::findOrFail($id);
        $book_categorys = Book_Category::where('libary_id',$id)->get();

        foreach ($book_categorys as $book_category){}


        if (!empty($book_category)){
            for ($i = 0; $i < $book_categorys->count(); $i++){
                $books = Book::where('book_category_id',$book_categorys[$i]->id)->get();

                foreach ($books as $book){}
                if (!empty($book)){
                    for ($j = 0; $j < $books->count(); $j++){
                        if (Storage::delete('public/books_photos/'.$books[$j]->image)){
                            $books[$j]->delete();
                        }else{
                            return back()->with('status','something is error');
                        }
                    }
                    $book_categorys[$i]->delete();
                }else{
                    $book_categorys[$i]->delete();
                }
            }

            if (Storage::delete('public/libarys_photos/'.$libary->image)){
                $libary->delete();
                return redirect()->route('backend_libary_manage')->with('status','Your libary and this libary book categorys also book category books are deleted');
            }else{
                return "folder is no file here";
            }

        }else {

            if (Storage::delete('public/libarys_photos/'.$libary->image)){
                $libary->delete();
                return redirect()->route('backend_libary_manage')->with('status','Your libary is deleted');
            }else{
                return "folder is no file here";
            }
        }
    }
}

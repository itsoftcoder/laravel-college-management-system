<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_Category;
use App\Building;
use App\Hostel;
use App\Libary;
use App\Room;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::orderBy('id','DESC')->get();
        return view('backend/buildings.index',compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend/buildings.create');
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
            'name'           => 'required | min:4',
            'establish_date' => 'required | date',
            'modifing_date'  => 'nullable | date'
        ]);

        $building = new Building();
        $building->name = $request->name;
        $building->establish_date = $request->establish_date;
        $building->modifing_date = $request->modifing_date;
        $building->save();
        return redirect()->route('backend_building_manage')->with('status','your building is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::findOrFail($id);
        return view('backend/buildings.edit',compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'           => 'required | min:4',
            'establish_date' => 'required | date',
            'modifing_date'  => 'nullable | date'
        ]);

        $building = Building::findOrFail($id);
        $building->name = $request->name;
        $building->establish_date = $request->establish_date;
        $building->modifing_date = $request->modifing_date;
        $building->update();
        return redirect()->route('backend_building_manage')->with('status','your building is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $libarys = Libary::where('building_id',$id)->get();
        $hostels = Hostel::where('building_id',$id)->get();
        $rooms = Room::where('building_id',$id)->get();

        foreach ($libarys as $libary){ }

        foreach ($hostels as $hostel){ }

        foreach ($rooms as $room){ }

        if (!empty($libary) && !empty($hostel) && !empty($room)){

            for ($i = 0; $i < $libarys->count(); $i++) {
                $book_categorys = Book_Category::where('libary_id',$libarys[$i]->id)->get();

                foreach ($book_categorys as $book_category){}
                if (!empty($book_category)){
                    for ($j = 0; $j < $book_categorys->count(); $j++){
                        $books = Book::where('book_category_id',$book_categorys[$j]->id)->get();

                        foreach ($books as $book){}
                        if (!empty($book)){
                            for ($k = 0; $k < $books->count(); $k++){
                                if (Storage::delete('public/books_photos/'.$books[$k]->image)){
                                    $books[$k]->delete();
                                }else{
                                    return back()->with('status','something is error');
                                }
                            }
                            $book_categorys[$j]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }

                        }else{
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }
                        }
                    }
                }else{
                    if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                        $libarys[$i]->delete();
                    }else{
                        return back()->with('status','something is error');
                    }
                }

            }

            for ($i = 0; $i < $rooms->count(); $i++) {

                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            for ($i = 0; $i < $hostels->count(); $i++){
                $hostels[$i]->delete();
            }

            $building->delete();

            return redirect()->route('backend_building_manage')->with('status','Your building , This building libarys , This buliding rooms and This building hostels are deleted');


        }elseif (!empty($libary) && !empty($hostel)){

            for ($i = 0; $i < $libarys->count(); $i++) {
                $book_categorys = Book_Category::where('libary_id',$libarys[$i]->id)->get();

                foreach ($book_categorys as $book_category){}
                if (!empty($book_category)){
                    for ($j = 0; $j < $book_categorys->count(); $j++){
                        $books = Book::where('book_category_id',$book_categorys[$j]->id)->get();

                        foreach ($books as $book){}
                        if (!empty($book)){
                            for ($k = 0; $k < $books->count(); $k++){
                                if (Storage::delete('public/books_photos/'.$books[$k]->image)){
                                    $books[$k]->delete();
                                }else{
                                    return back()->with('status','something is error');
                                }
                            }
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }

                        }else{
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }
                        }
                    }
                }else{
                    if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                        $libarys[$i]->delete();
                    }else{
                        return back()->with('status','something is error');
                    }
                }

            }

            for ($i = 0; $i < $hostels->count(); $i++){
                $hostels[$i]->delete();
            }

            $building->delete();

            return redirect()->route('backend_building_manage')->with('status','Your building , This building libarys and This building hostels are deleted');


        }elseif (!empty($libary) && !empty($room)){

            for ($i = 0; $i < $libarys->count(); $i++) {
                $book_categorys = Book_Category::where('libary_id',$libarys[$i]->id)->get();

                foreach ($book_categorys as $book_category){}
                if (!empty($book_category)){
                    for ($j = 0; $j < $book_categorys->count(); $j++){
                        $books = Book::where('book_category_id',$book_categorys[$j]->id)->get();

                        foreach ($books as $book){}
                        if (!empty($book)){
                            for ($k = 0; $k < $books->count(); $k++){
                                if (Storage::delete('public/books_photos/'.$books[$k]->image)){
                                    $books[$k]->delete();
                                }else{
                                    return back()->with('status','something is error');
                                }
                            }
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }

                        }else{
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }
                        }
                    }
                }else{
                    if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                        $libarys[$i]->delete();
                    }else{
                        return back()->with('status','something is error');
                    }
                }

            }

            for ($i = 0; $i < $rooms->count(); $i++) {

                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            $building->delete();

            return redirect()->route('backend_building_manage')->with('status','Your building , This building libarys and This building rooms are deleted');

        }elseif (!empty($hostel) && !empty($room)){

            for ($i = 0; $i < $hostels->count(); $i++){
                $hostels[$i]->delete();
            }

            for ($i = 0; $i < $rooms->count(); $i++) {

                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            $building->delete();

            return redirect()->route('backend_building_manage')->with('status','Your building , This building hostels and This building rooms are deleted');

        }elseif (!empty($libary)){
            for ($i = 0; $i < $libarys->count(); $i++) {
                $book_categorys = Book_Category::where('libary_id',$libarys[$i]->id)->get();

                foreach ($book_categorys as $book_category){}
                if (!empty($book_category)){
                    for ($j = 0; $j < $book_categorys->count(); $j++){
                        $books = Book::where('book_category_id',$book_categorys[$j]->id)->get();

                        foreach ($books as $book){}
                        if (!empty($book)){
                            for ($k = 0; $k < $books->count(); $k++){
                                if (Storage::delete('public/books_photos/'.$books[$k]->image)){
                                    $books[$k]->delete();
                                }else{
                                    return back()->with('status','something is error');
                                }
                            }
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }

                        }else{
                            $book_categorys[$i]->delete();

                            if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                                $libarys[$i]->delete();
                            }else{
                                return back()->with('status','something is error');
                            }
                        }
                    }
                }else{
                    if (Storage::delete('public/libarys_photos/'.$libarys[$i]->image)){
                        $libarys[$i]->delete();
                    }else{
                        return back()->with('status','something is error');
                    }
                }

            }

            $building->delete();
            return redirect()->route('backend_building_manage')->with('status','Your building and This building libarys also libary book category and book category books are deleted');

        }elseif (!empty($hostel)){

          for ($i = 0; $i < $hostels->count(); $i++){
               $hostels[$i]->delete();
               $building->delete();
          }
               return redirect()->route('backend_building_manage')->with('status','Your building and This building hostels are deleted');

        }elseif (!empty($room)){

            for ($i = 0; $i < $rooms->count(); $i++) {

                if (Storage::delete('public/rooms_photos/'.$rooms[$i]->image)){
                    $rooms[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            $building->delete();
            return redirect()->route('backend_building_manage')->with('your Building And this building rooms are deleted');

        }else {

        $building->delete();
        return redirect()->route('backend_building_manage')->with('status','Your building is deleted');
        }
    }
}

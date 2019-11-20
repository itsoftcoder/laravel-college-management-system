<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_Category;
use App\Libary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_categorys = Book_Category::orderBy('id','DESC')->get();
        return view('backend/book_categorys.index',compact('book_categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libarys = Libary::all();
        return view('backend/book_categorys.create',compact('libarys'));
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
            'libary_id'         => 'required',
            'description'  => 'required | max:200'
        ]);

        $book_category = new Book_Category();
        $book_category->name = $request->name;
        $book_category->libary_id = $request->libary_id;
        $book_category->description = $request->description;

        $book_category->save();
        return redirect()->route('backend_book_category_manage')->with('status','your book category create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book_Category  $book_Category
     * @return \Illuminate\Http\Response
     */
    public function show(Book_Category $book_Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book_Category  $book_Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_category = Book_Category::findOrFail($id);
        $libarys = Libary::all();
        return view('backend/book_categorys.edit',compact('book_category','libarys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book_Category  $book_Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'libary_id'         => 'required',
            'description'  => 'required | max:200',
        ]);

        $book_category = Book_Category::findOrFail($id);

        $book_category->name = $request->name;
        $book_category->libary_id = $request->libary_id;
        $book_category->description = $request->description;
        $book_category->update();
        return redirect()->route('backend_book_category_manage')->with('status','Your book category update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book_Category  $book_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_category = Book_Category::findOrFail($id);
        $books = Book::where('book_category_id',$id)->get();

        foreach ($books as $book){}

        if (!empty($book)){
            for ($i = 0; $i < $books->count(); $i++){
                if (Storage::delete('public/books_photos/'.$books[$i]->image)){
                    $books[$i]->delete();
                }else{
                    return back()->with('status','something is error');
                }
            }

            $book_category->delete();
            return redirect()->route('backend_book_category_manage')->with('status','Your book category and this book category books are is deleted');

        }else {
            $book_category->delete();
            return redirect()->route('backend_book_category_manage')->with('status','Your book category is deleted');
        }
    }
}

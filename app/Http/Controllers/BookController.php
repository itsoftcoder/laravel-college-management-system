<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_Category;
use App\Classe;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id','DESC')->get();
        return view('backend/books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_categorys = Book_Category::all();
        $classes = Classe::all();
        return view('backend/books.create',compact('book_categorys','classes'));
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
            'book_category_id'        => 'nullable',
            'class_id'      => 'nullable',
            'author_name'     => 'required',
            'publication'     => 'required',
            'image'        => 'required | image'
        ]);

        $book = new Book();
        $book->name = $request->name;
        $book->book_category_id = $request->book_category_id;
        $book->class_id = $request->class_id;
        $book->author_name = $request->author_name;
        $book->publication = $request->publication;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = sha1(time()).'.'.$extension;
            $file->move('storage/books_photos/',$filename);
            $book->image = $filename;
        }

        $book->save();
        return redirect()->route('backend_book_manage')->with('status','your book create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('backend/books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $book_categorys = Book_Category::all();
        $classes = Classe::all();
        return view('backend/books.edit',compact('book','book_categorys','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'         => 'required | min:3',
            'book_category_id'        => 'required',
            'class_id'      => 'required',
            'author_name'     => 'required',
            'publication'     => 'required',
            'image'        => 'nullable | image'
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('image')){
            if (Storage::delete('public/books_photos/'.$book->image)) {
                $book->name = $request->name;
                $book->book_category_id = $request->book_category_id;
                $book->class_id = $request->class_id;
                $book->author_name = $request->author_name;
                $book->publication = $request->publication;

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = sha1(time()) . '.' . $extension;
                $file->move('storage/books_photos/', $filename);
                $book->image = $filename;
                $book->update();
                return redirect()->route('backend_book_manage')->with('status','Your book update succesfully');
            }else{
                return "your folder is no file here";
            }
        }else{
            $book->name = $request->name;
            $book->book_category_id = $request->book_category_id;
            $book->class_id = $request->class_id;
            $book->author_name = $request->author_name;
            $book->publication = $request->publication;
            $book->update();
            return redirect()->route('backend_book_manage')->with('status','Your book update succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if (Storage::delete('public/books_photos/'.$book->image)){
            $book->delete();
            return redirect()->route('backend_book_manage')->with('status','Your book is deleted');
        }else{
            return "folder is no file here";
        }
    }
}

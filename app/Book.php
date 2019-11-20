<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';
    protected $fillable = ['name','image','author_name','class_id','book_category_id','publication'];
    /**
     * This is the book_function function
     *
     * It is work for one to many relationship with Book model
     *
     * And it is return to belongsTO relation with Book_Category model class
     */

    public function book_category(){
        return $this->belongsTo(Book_Category::class);
    }

    /**
     * This is the classe function
     *
     * It is work for one to many relationship with Book model
     *
     * And it is return to belongsTo relationship with Classe model class
     */

    public function class(){
        return $this->belongsTo(Classe::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_Category extends Model
{
    protected $table = 'bookCategories';
    protected $fillable = ['name','description','libary_id'];
    /**
     * This is the libary function
     *
     * It is work for one to many relationship with Book_Category model
     *
     * And it is return to belongsTO relationship with Libary model class
     */

    public function libary(){
        return $this->belongsTo(Libary::class);
    }

    /**
     * This is the books function
     *
     * It is work for one to many relationship with Book_Category model
     *
     * And it is return to hasMany relationship with Book model class
     */

    public function books(){
        return $this->hasMany(Book::class);
    }

}

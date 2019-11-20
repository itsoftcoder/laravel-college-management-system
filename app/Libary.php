<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libary extends Model
{
    protected $table = 'libaries';
    protected $fillable = ['name','image','description','building_id'];
    /**
     * This is the book_categories function
     *
     * It is work for one to many relationship with Libary model
     *
     * And it is return to hasMany relationship with Book_Category model class
     */

    public function book_categorys(){
        return $this->hasMany(Book_Category::class);
    }

    /**
     * This is the building function
     *
     * It is work for one to one relationship with Libary model
     *
     * And it is return to belongsTo relationship with Building model class
     */

    public function building(){
        return $this->belongsTo(Building::class);
    }

}

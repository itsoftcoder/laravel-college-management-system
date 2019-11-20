<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{

    protected $table = 'labs';
    protected $fillable = ['name','image','capacity','description','quantity'];
    /**
     * This is the rooms function
     *
     * It is work for one to many relationship with lab model
     *
     * And it is return to hasMany relationship with Room model class
     */

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    /**
     * This is the photos function
     *
     * It is work for one to many relationship with Lab model
     *
     * And it is return to hasMany relationship with Photo model class
     */

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    /**
     * This is the videos function
     *
     * It is work for one to many relationship with Lab model
     *
     * And it is return to hasMany relationship with Video model class
     */

    public function videos(){
        return $this->hasMany(Video::class);
    }

}

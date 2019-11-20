<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $table = 'magazines';
    protected $fillable = ['name','image','description','start_time','end_time'];
    /**
     * This is the photos function
     *
     * It is work for one to many relationship with Magazine model
     *
     * And it is return to hasMany relationship with Photo model class
     */

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    /**
     * This is the videos function
     *
     * It is work for one to many relationship with Magazine model
     *
     * And it is return to hasMany relationship with Video model class
     */

    public function videos(){
        return $this->hasMany(Video::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{

    protected $table = 'buildings';

    protected $fillable = ['name','establish_date','modifing_date'];
    /**
     * This is the libary function
     *
     * It is work for one to one relationship with building model
     *
     * And it is return to hasOne relationship with Libary model class
     */

    public function libary(){
        return $this->hasOne(Libary::class);
    }

    /**
     * This is the hostel function
     *
     * It is work for one to one relationship with Building model
     *
     * And it is return to hasOne relationship with Hostel model class
     */

    public function hostel(){
        return $this->hasOne(Hostel::class);
    }

    /**
     * This is the rooms function
     *
     * It is work for one to many relationship with Building model
     *
     * And it is return to hasMany relationship with Room model class
     */

    public function rooms(){
        return $this->hasMany(Room::class);
    }



}

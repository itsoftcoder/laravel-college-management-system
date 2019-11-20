<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $table = 'rooms';
    protected $fillable = ['name','building_id','lab_id','image','length','width','height'];
    /**
     * This is the building function
     *
     * It is work for one to many relationship with Room model
     *
     * And it is return to hasMany relationship with Building model class
     */

    public function building(){
        return $this->belongsTo(Building::class);
    }

    /**
     * This is the lab function
     *
     * It is work for one to many relationship with Room model
     *
     * And it is return to belongsTo relationship with Lab model class
     */

    public function lab(){
        return $this->belongsTo(Lab::class);
    }

}

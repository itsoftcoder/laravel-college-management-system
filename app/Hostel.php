<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $table = 'hostels';
    protected $fillable = ['name','description','building_id'];
    /**
     * This is the building function
     *
     * It is work for one to one relationship with Hostel model
     *
     * And it is return to belongsTo relationship with Building model class
     */

    public function building(){
        return $this->belongsTo(Building::class);
    }

}

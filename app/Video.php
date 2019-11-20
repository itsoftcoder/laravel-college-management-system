<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['name','video','size','length','program_id','magazine_id','lab_id','garden_id','pool_id'];

    /**
     * This is the magazine function
     *
     * It is work for one to many relationship with Video model
     *
     * And it is return to belongs relationship with Magazine model class
     */

    public function magazine(){
        return $this->belongsTo(Magazine::class);
    }

    /**
     * This is the program function
     *
     * It is work for one to many relationship with Video model
     *
     * And it is return to belongsTo relationship with Program model class
     */

    public function program(){
        return $this->belongsTo(Program::class);
    }

    /**
     * This is the gerden function
     *
     * It is work for one to many relationship with Video model
     *
     * And it is return to BelognsTo relationship with Gerden model class
     */

    public function garden(){
        return $this->belongsTo(Garden::class);
    }


    /**
     * This is the lab function
     *
     * It is work for one to many relationship with Video model
     *
     * And it is return to BelongsTo relationship with Lab model class
     */

    public function lab(){
        return $this->belongsTo(Lab::class);
    }


    /**
     * This is the pool function
     *
     * It is work for one to many relationship with Video model
     *
     * And it is return to belongsTO relationship with Pool model class
     */

    public function pool(){
        return $this->belongsTo(Pool::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $fillable = ['name','class_id','department_id','session','year','start_date','end_date'];

    /**
     * This is the class function
     *
     * It is work for one to many relationship with exam model
     *
     * And it is return to belongs relationship with classe model class
     */

    public function class(){
        return $this->belongsTo(Classe::class);
    }

    /**
     * This is the department function
     *
     * It is work for one to many relationship with exam model
     *
     * And it is return to belongs relationship with department model class
     */

    public function department(){
        return $this->belongsTo(Department::class);
    }


    /**
     * This is the results function
     *
     * It is work for one to Many relationship with exam model
     *
     * And it is return to hasMany relationship with result model class
     */

    public function results(){
        return $this->hasMany(Result::class);
    }

}

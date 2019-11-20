<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'departments';

    protected $fillable = [
        'name', 'code', 'description','image',
    ];

    /**
     * This is the student function
     *
     * It is work for one to one relationship with department model
     *
     * And it is return to hasOne relationship with Student model class
     */

    public function student(){
        return $this->hasOne(Student::class);
    }

    /**
     * This is the notices function
     *
     * It is work for one to Many relationship with Department model
     *
     * And it is return to hasMany relationship with Notice model class
     */

    public function notices(){
        return $this->hasMany(Notice::class);
    }

    /**
     * This is the exams function
     *
     * It is work for one to Many relationship with Department model
     *
     * And it is return to hasMany relationship with exam model class
     */

    public function exams(){
        return $this->hasMany(Exam::class);
    }
}

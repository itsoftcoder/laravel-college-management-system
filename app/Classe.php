<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{

    protected $table = 'classes';
    protected $fillable = [
        'name', 'code', 'description','image',
    ];

    /**
     * This is the student function
     *
     * It is work for one to one relationship with classe model
     *
     * And it is return to hasOne relation with Student model class
     */

    public function student(){
        return $this->hasOne(Student::class);
    }

    /**
     * This is the notices function
     *
     * It is work for one to many relationship with classe model
     *
     * And it is return to hasMany relationship with Notice model class
     */

    public function notices(){
        return $this->hasMany(Notice::class);
    }


    /**
     * This is the books function
     *
     * It is work for one to many relationship with Classe model
     *
     * And it is return to hasMany relationship with Books model class
     */

    public function books(){
        return $this->hasMany(Book::class);
    }


    /**
     * This is the exams function
     *
     * It is work for one to Many relationship with class model
     *
     * And it is return to hasMany relationship with exams model class
     */

    public function exams(){
        return $this->hasMany(Exam::class);
    }

}

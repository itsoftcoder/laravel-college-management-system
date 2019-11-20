<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driving_Course extends Model
{
    protected $table = 'drivingCourses';

    protected $fillable = ['name','description','manager_name','course_month','establish_date'];
    /**
     * This is the driving_teachers function
     *
     * It is work for one to many relationship with Driving_Course model
     *
     * And it is return to hasMany relationship with Driving_Teacher model class
     */

    public function driving_teachers(){
        return $this->hasMany(Driving_Teacher::class);
    }

    /**
     * This is the driving_students function
     *
     * It is work for one to many relationship with Driving_Course model
     *
     * And it is return to hasMany relationship with Driving_Student model class
     */

    public function driving_students(){
        return $this->hasMany(Driving_Student::class);
    }

}

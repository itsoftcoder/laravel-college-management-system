<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driving_Teacher extends Model
{

    protected $table = 'drivingTeachers';

    protected $fillable = ['name','image','driving_course_id','skills','email','phone_number','experience','requested','gender','present_address','permanant_address','salary','join_date','work_hour','about','date_of_birth','document'];
    /**
     * This is the driving_course function
     *
     * It is work for one to many relationship with Driving_Teacher model
     *
     * And it is return to hasMany relationship with Driving_Course model class
     */

    public function driving_course(){
        return $this->belongsTo(Driving_Course::class);
    }

}

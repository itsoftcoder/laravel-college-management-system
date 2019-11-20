<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driving_Student extends Model
{
    protected $table = 'drivingStudents';
    protected $fillable = ['name','father_name','requested','mother_name','image','driving_course_id','email','phone_number','gender','present_address','permanant_address','join_date','date_of_birth','status','document'];


    public function driving_course(){
        return $this->belongsTo(Driving_Course::class);
    }

}

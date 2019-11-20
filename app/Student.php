<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';

    protected $fillable = ['name','class_id','department_id','father_name','mother_name','roll_no','email','phone_number','image','gender','session','semester','requested','present_address','permanant_address','shift','status','document','date_of_birth'];
    /**
     * This is the classe function
     *
     * It was work for one to one ration with student
     *
     * And this function return belongsto relation with classe model class
     */

    public function class(){
        return $this->belongsTo(Classe::class);
    }

    /**
     * This is the department function
     *
     * It was work for one to one ration with student
     *
     * And this function return belongsto relation with Department model class
     */

    public function department(){
        return $this->belongsTo(Department::class);
    }

    /**
     * This is the result function
     *
     * It is work for one to one relationship with student model
     *
     * And it is return to hasone relationship with result model class
     */

    public function result(){
        return $this->hasOne(Result::class);
    }


    /**
     * This is the attachments function
     *
     * It is work for one to Many relationship with ** Student ** model
     *
     * And it is return to hasMany relationship with ** Attachment ** model class
     */

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }


}

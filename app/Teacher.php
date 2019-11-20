<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['name','profetion','image','email','phone_number','gender','skills','present_address','permanant_address','date_of_birth','about','salary','age','join_date'];



    /**
     * This is the attachments function
     *
     * It is work for one to Many relationship with Teacher model
     *
     * And it is return to hasMany relationship with Attachment model class
     */

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

}

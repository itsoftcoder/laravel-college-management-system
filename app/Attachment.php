<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $fillable = ['name','student_id','teacher_id','attachment'];

    /**
     * This is the student function
     *
     * It is work for one to many relationship with attachment model
     *
     * And it is return to belongs relationship with student model class
     */

    public function student(){
        return $this->belongsTo(Student::class);
    }

    /**
     * This is the teacher function
     *
     * It is work for one to many relationship with attachment model
     *
     * And it is return to belongs relationship with teacher model class
     */

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

}

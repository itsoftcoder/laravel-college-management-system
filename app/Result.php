<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    protected $fillable = ['student_id','exam_id','total_mark','gpa'];

    /**
     * This is the student function
     *
     * It is work for one to many relationship with result model
     *
     * And it is return to belongs relationship with student model class
     */

    public function student(){
        return $this->belongsTo(Student::class);
    }

    /**
     * This is the exam function
     *
     * It is work for one to many relationship with result model
     *
     * And it is return to belongs relationship with exam model class
     */

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'admissions';
    protected $fillable = ['name','session','year','start_date','end_date'];
}

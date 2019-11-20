<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gest extends Model
{
    protected $table = 'gests';
    protected $fillable = ['name','image','description','start_date','end_date','skills','address'];
}

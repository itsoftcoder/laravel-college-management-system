<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{

    protected $table = 'notices';

    protected $fillable = ['name','document','class_id','department_id'];
    /**
     * This is the classe function
     *
     * It is work for one to many relationship with notice model
     *
     * And it is return to BelongsTO relationship with classe model class
     */

    public function class(){
        return $this->belongsTo(Classe::class);
    }

    /**
     * This is the department function
     *
     * It is work for one to many relationship with notice model
     *
     * And it is return to hasmany relationship with Department model class
     */

    public function department(){
        return $this->belongsTo(Department::class);
    }

}

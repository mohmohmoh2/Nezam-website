<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructors extends Model
{
    protected $table = "instructors";
    protected $fillable = ['instructorName', 'instructorImg', 'instructorDesc'];

    public function courses(){
        return $this->hasMany('App\Models\courses', 'instructor_id');
    }
}

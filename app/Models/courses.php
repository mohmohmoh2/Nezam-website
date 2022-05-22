<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $table = "courses";
    protected $fillable = ['courseName', 'img', 'courseDesc', 'shortDesc', 'courseLevel', 'instructor_id', 'cat_id'];
    public function lec (){
        return $this->hasMany('App\Models\lectures');
    }

    public function instructors (){
        return $this->belongsTo('App\Models\instructors', 'id');
    }

}

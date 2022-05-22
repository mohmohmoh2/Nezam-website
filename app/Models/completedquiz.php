<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class completedquiz extends Model
{
    use HasFactory;
    protected $table = "completedquizzes";
    protected $fillable = ['user_id', 'lec_id', 'course_id'];

}

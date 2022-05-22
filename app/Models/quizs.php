<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizs extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'ans1', 'ans2', 'ans3', 'ans4', 'lec_id'];

    public function lectures(){
        return $this->belongsTo('App\Models\lectures', 'lec_id');
    } 


}

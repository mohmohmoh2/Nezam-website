<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilePageController extends Controller
{
    //
    public function index ()
    {
        # code...
        return view('Front.profile');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\instructors;
use App\Models\courses;
use App\Models\enrolled;
use App\Models\lectures;
use Illuminate\Http\Request;

class CoursesPageController extends Controller
{
    //
    public function index($id){

        $data2['instructors'] = instructors::select('id', 'instructorName', 'instructorImg', 'instructorDesc')
        ->get();

        $enrolleds['enrolleds'] = enrolled::select('id', 'user_id', 'course_id')->where('course_id',$id)
        ->get();

        $data['courses'] = courses::select('id', 'courseName', 'courseDesc', 'courseLevel', 'img', 'instructor_id')->where('id',$id)
        ->get();

        $lectures['lectures'] = lectures::select('id', 'lecName', 'lecUrl', 'course_id')->where('course_id',$id)
        ->get();


        return view('Front.courses')->with($data)->with($data2)->with($lectures)->with($enrolleds);

    }
}

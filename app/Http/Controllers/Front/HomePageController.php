<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\categorys;
use App\Models\certiticates;
use App\Models\completedquiz;
use App\Models\courses;
use App\Models\enrolled;
use App\Models\instructors;
use App\Models\lectures;
use App\Models\quizs;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Models\User;

class HomePageController extends Controller
{
    //
    public function index(){
        $data2['instructors'] = instructors::select('id', 'instructorName', 'instructorImg', 'instructorDesc')
        ->get();
        $cat['cat'] = categorys::select('id', 'Catname')
        ->get();
        $data3['sett'] = settings::select('id', 'mainName', 'aboutUs', 'students', 'courses', 'certificates', 'years')
        ->get();
        $data['courses'] = courses::select('id', 'courseName', 'courseDesc', 'shortDesc', 'courseLevel', 'img', 'cat_id', 'instructor_id', 'updated_at')
        ->get();

        return View('Front.index')->with($data)->with($data2)->with($data3)->with($cat);
    }

    public function editLecture($id)
    {
        # code...
    }

    public function enroll ($id)
    {
        # code...
        $data = [
            'user_id' => auth()->user()->id,
            'course_id'  => $id,
        ];
        enrolled::create($data);
        return back();
    }


    public function Lectures($id,$lid)
    {
        # code...
        $slecture['slecture'] = lectures::select('id', 'lecName', 'lecUrl', 'course_id')->where('id',$lid)
        ->get();

        $lectures['lectures'] = lectures::select('id', 'lecName', 'lecUrl', 'course_id')->where('course_id',$id)
        ->get();

        $data2['instructors'] = instructors::select('id', 'instructorName', 'instructorImg', 'instructorDesc')
        ->get();

        $data['courses'] = courses::select('id', 'courseName', 'courseDesc', 'courseLevel', 'img', 'instructor_id')->where('id',$id)
        ->get();

        $quizs['quizs'] = quizs::select('id', 'question', 'ans1', 'ans2', 'ans3', 'ans4', 'lec_id')->where('lec_id',$lid)
        ->get();

        $cquizs['cquizs'] = completedquiz::select('id', 'user_id', 'lec_id', 'course_id')->where('course_id',$id)->where('user_id', auth()->user()->id)
        ->get();

        return view('Front.lectures')->with($slecture)->with($lectures)->with($quizs)->with($cquizs)->with($data)->with($id)->with($data2);
    }
    public function profile ()
    {
        # code...
        $certiticates['certiticates'] = certiticates::select('id', 'credintial_id', 'user_id', 'course_id')->where('user_id', auth()->user()->id)
        ->get();

        $enrolled['enrolled'] = enrolled::select('id', 'user_id', 'course_id', 'course_id')->where('user_id', auth()->user()->id)
        ->get();
        
        return view('Front.profile')->with($certiticates)->with($enrolled);

    }

    public function edit (Request $request)
    {
        $data = ([
            'name' => $request->name,
            'lName'  => $request->lName,
            'city'  => $request->city,
            'address'  => $request->address,
            'updated_at'  => date("Y-m-d H:i:s"),
        ]);
        user::findOrFail(auth()->user()->id)->update($data);
        setcookie('succ', 'msg', time()+5);
        return back();
    }

}

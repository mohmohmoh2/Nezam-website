<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorys;
use App\Models\completedquiz;
use App\Models\courses;
use Illuminate\Http\Request;
use App\Models\instructors;
use App\Models\lectures;
use App\Models\quizs;
use App\Models\settings;

class AdminPageController extends Controller
{
    //
    public function index ()
    {
        if (auth()->user()->admin == 0) {
            # code...
            echo auth()->user()->admin;
            return redirect('/');
        }
        $instructor['instructors'] = instructors::select('id', 'instructorName', 'instructorImg', 'instructorDesc')
        ->get();
        $courses['courses'] = courses::select('id', 'img', 'courseName', 'shortDesc', 'courseLevel', 'instructor_id')
        ->get();
        $sett['sett'] = settings::select('id', 'mainName', 'aboutUs', 'students', 'courses', 'certificates', 'years')->where('id', 1)
        ->get();
        $cat['cat'] = categorys::select('id', 'Catname')
        ->get();
        $quizs['quizs'] = quizs::select('id', 'question', 'ans1', 'ans2', 'ans3', 'ans4', 'lec_id')
        ->get();
        $lectures['lectures'] = lectures::select('id', 'lecUrl', 'course_id');
        return view('admin.admin')->with($instructor)->with($courses)->with($lectures)->with($quizs)->with($sett)->with($cat);
    }
    public function editsett (Request $request)
    {
        $data = [
            'mainName' => $request->mainName,
            'aboutUs' => $request->aboutUs,
            'students' => $request->students,
            'courses' => $request->courses,
            'certificates' => $request->certificates,
            'years' => $request->years,
        ];
        settings::findOrFail(1)->update($data);
        setcookie('succ', 'msg', time()+5);
        return back();
    }
    public function Instructor (Request $request)
    {
        # code...
        $data = $request->validate([
            'instructorName' => 'required',
            'instructorImg'  => 'required|image|mimes:png,jpg,jpeg',
            'instructorDesc'  => 'required',
        ]);
        $new_name = $data['instructorImg']->hashName();
        $request->instructorImg->move('uploads/instructors',$new_name);
        $data['instructorImg'] = $new_name;
        instructors::create($data);
        return redirect(route('admin'));
    }

    public function Courses (Request $request)
    {
        $data = $request->validate([
            'courseName' => 'required',
            'img'  => 'required|image|mimes:png,jpg,jpeg',
            'courseDesc'  => 'required',
            'shortDesc'  => 'required',
            'courseLevel'  => 'required',
            'instructor_id'  => 'required',
            'cat_id'  => 'required',
        ]);
        $new_name = $data['img']->hashName();
        $request->img->move('uploads/courses',$new_name);
        $data['img'] = $new_name;
        courses::create($data);
        return redirect(route('admin'));
    }

    public function Lectures (Request $request)
    {
        $data = $request->validate([
            'lecName' => 'required',
            'lecUrl'  => 'required',
            'course_id'  => 'required',
        ]);
        lectures::create($data);
        return redirect(route('admin'));
    }

    public function quiz (Request $request)
    {
        $data = $request->validate([
            'question' => 'required',
            'ans1'  => 'required',
            'ans2'  => 'required',
            'ans3'  => 'required',
            'ans4'  => 'required',
            'lec_id'  => 'required',
        ]);

        $lecId = $data['lec_id'];
        $lectures['lectures'] = lectures::select('id')->where('lecName', $lecId)
        ->get();

        $data['lec_id'] = $lectures['lectures'][0]['id'];
        quizs::create($data);
        return redirect(route('admin'));
    }


    public function submit (Request $request)
    {
        $quizs['quizs'] = quizs::select('id', 'question', 'ans1', 'lec_id')->where('lec_id', $request['id'])
        ->get();
        $ch = [];
        $count = $request['cid'] -1;
        for ($i=1; $i <= $count; $i++) { 
            if (isset($request['ans'.$i])) {
                if ($request['ans'.$i] == $quizs['quizs'][$i-1]['ans1']) {
                    array_push($ch,"true");
                }else {
                    array_push($ch,"false");
                }
            }
        }
        if (in_array("false",$ch)) {
            setcookie('error', 'msg', time()+5);
            return redirect('Courses/'.$request['coid'].'/'.$request['lid'].'#quiz');
        }else {
            setcookie('succ', 'msg', time()+5);
            $completed['completed'] = completedquiz::select('id', 'user_id', 'lec_id')->where('lec_id', $request['id'])
            ->get();
            $arr = [];
            foreach ($completed['completed'] as $key => $value) {
                if ($value['user_id'] == auth()->user()->id) {
                    array_push($arr,"true");
                }
            }
            if (in_array("true",$arr)) {
                return back();
            }else {
                $qdata = [
                    'user_id' => auth()->user()->id,
                    'lec_id' => $request['id'],
                    'course_id' => $request['coid'],
                ];
                print_r($qdata);
                completedquiz::create($qdata);
                return back();
            }
            return back();
        }
    }

    public function editCourse (Request $request)
    {
        $lectures['lectures'] = lectures::select('id', 'lecName', 'lecUrl', 'course_id')
        ->get();
        return view('admin.editCourse')->with($lectures);
    }

    public function editQuiz (Request $request)
    {
        $data = [
            'id' => $request->id,
            'question' => $request->question,
            'ans1'  => $request->ans1,
            'ans2'  => $request->ans2,
            'ans3'  => $request->ans3,
            'ans4'  => $request->ans4,
        ];
        quizs::findOrFail($request->id)->update($data);
        setcookie('succ', 'msg', time()+5);
        return back();
    }

    public function editLecture (Request $request)
    {
        $data = [
            'lecName' => $request->lecName,
            'lecUrl' => $request->lecUrl,
        ];
        # code...

        lectures::findOrFail($request->id)->update($data);
        setcookie('succ', 'msg', time()+5);
        return back();
    }

    //  Delete Functions
    public function delLec ($id)
    {
        # code...
        lectures::findOrFail($id)->delete();
        return back();

    }
    public function delCourse ($id)
    {
        # code...
        courses::findOrFail($id)->delete();
        return back();
    }
    public function delQuiz ($id)
    {
        quizs::findOrFail($id)->delete();
        return back();
    }
    public function delInstructor ($id)
    {
        instructors::findOrFail($id)->delete();
        return back();
    }

    public function addcat (Request $request)
    {
        $data = [
            'Catname' => $request->Catname,
        ];
        categorys::create($data);
        return back();

    }


}

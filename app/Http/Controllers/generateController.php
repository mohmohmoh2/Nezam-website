<?php

namespace App\Http\Controllers;

use App\Models\certiticates;
use Illuminate\Http\Request;
use App\Models\lectures;
use App\Models\completedquiz;
use App\Models\courses;
use Illuminate\Support\Facades\Redirect;

class generateController extends Controller
{
    public function generate($id)
    {
        # code...
        $lectures['lectures'] = lectures::select('id', 'lecName', 'lecUrl', 'course_id')->where('course_id',$id)
        ->get();
        $lec = [];
        foreach ($lectures['lectures'] as $key => $value) {
            array_push($lec, $value['id']);
            print_r( $lec);
            echo  '<br>';
        }
        $list = [];

        for ($i=0; $i < sizeof($lec); $i++) { 
            $completed['completed'] = completedquiz::select('id', 'user_id', 'lec_id')->where('lec_id', $lec[$i])
            ->get();
            foreach ($completed['completed'] as $key => $value) {
                # code...
                echo $value['user_id'] . '<br>';
                if ($value['user_id'] == auth()->user()->id) {
                    array_push($list,"true");
                }
            }
        }
        if (sizeof($lec) != sizeof($list)) {
            $_SESSION['re'] = "exist";
            header("location: lectures/index.php?id=1&n=1");
        }else {
            # code...
                // Generate random credintial id for the certificate
            $creditId = "";
            $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
            $size = strlen( $chars );  
            for( $i = 0; $i < 20; $i++ ) {  
                $str= $chars[ rand( 0, $size - 1 ) ];
                $creditId = $creditId.$str;
            }
            $certiticates['certiticates'] = certiticates::select('id', 'credintial_id', 'user_id', 'course_id')->where('course_id', $id)
            ->get();
            $cred = [];
            foreach ($certiticates['certiticates'] as $key => $value) {
                if ($value['user_id'] == auth()->user()->id) {
                    array_push($cred, $value['credintial_id']);
                }
            }
            if ($cred != []) {
                $creditId = $cred[0];
                // the user has already finished this course and get his certificate
                $locatiion = 'certificate/'.$creditId.".jpg";
                return redirect($locatiion);
            }else {
                $data = [
                    'credintial_id' => $creditId,
                    'user_id' => auth()->user()->id,
                    'course_id' => $id,
                ];
                certiticates::create($data);
                $data['courses'] = courses::select('id', 'courseName', 'courseDesc', 'courseLevel', 'img', 'instructor_id')->where('id',$id)
                ->get();
                header('Content-type: image/jpeg');
                $font=realpath('arial.ttf');
                $image=imagecreatefromjpeg("formaat.jpg");
                $color=imagecolorallocate($image, 51, 51, 102);
                $date=date('d F, Y');
                imagettftext($image, 18, 0, 130, 1080, $color,$font, $date);
                $name=auth()->user()->name." ".auth()->user()->lname;
                $course= " has successfully completed \n"." ".$data['courses'][0]['courseName']."\n an online non-credit course offered through Coursera";
                imagettftext($image, 68, 0, 115, 520, $color,$font, $name);
                imagettftext($image, 30, 0, 115, 800, $color,$font, $course);
                $creditIda = "Credential ID : ".$creditId;
                imagettftext($image, 20, 0, 130, 1200, $color,$font, $creditIda);
                imagejpeg($image,public_path('certificate/').$creditId.".jpg");
                $locatiion = 'certificate/'.$creditId.".jpg";
                return redirect($locatiion);
                imagedestroy($image);
            }
        }
    }

}

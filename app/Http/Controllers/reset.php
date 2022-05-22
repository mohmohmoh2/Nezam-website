<?php




namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class reset extends Controller
{
    //

public function index ()
{
    # code...
    return view('reset.email');
}

public function emailcheck (Request $request)
{
    $connection = mysqli_connect("localhost", "root", "", "nezam1");
    if(! $connection){echo "problem";}
    # code...
      // Generate random credintial id for the certificate
    $creditId = "";
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
    $size = strlen( $chars );  
    for( $i = 0; $i < 6; $i++ ) {  
        $str= $chars[ rand( 0, $size - 1 ) ];
        $creditId = $creditId.$str;
    }
    $data = ['reset' => $creditId];
    //$request->email;
    $users['users'] = User::select('id', 'email')->get();
    $emails = [];
    foreach ($users['users'] as $key => $value) {
        array_push($emails,$value['email']);
    }
    if (in_array($_GET['email'], $emails)) {
        $users['users'] = User::select('id', 'email')->where('email', $_GET['email'])->get();
        echo $users['users'][0]['id'];

        $select = "UPDATE `users` SET `reset` = '".$creditId."' WHERE `email` = '".$_GET['email']."' LIMIT 1";
        $result = mysqli_query($connection, $select);
        
        mail($_GET['email'],"Nezam Verification Code",$creditId);
        return route('admin.code');
    }else{
        setcookie('error', 'msg', time()+5);
        return back();
    }
}

public function code ()
{
    # code...
    return view('reset.code');
}

public function codecheck ()
{
    # code...
    $users['users'] = User::select('id', 'email', 'reset')->where('email', $_GET['email'])->get();

    foreach ($users['users'] as $key => $value) {
        # code...
        echo $value['reset'];

        if ($value['reset'] == $_GET['code']) {
            # code...
            return redirect('freset/'.$value['id']);
        }
    }

}

public function reset ()
{
    # code...
    return view('reset.reset');
}

public function passcheck ()
{
    # code...
    $connection = mysqli_connect("localhost", "root", "", "nezam1");
    if(! $connection){echo "problem";}

    $select = "UPDATE `users` SET `password` = '".$_GET['new']."' WHERE `id` = '".$_GET['id']."' LIMIT 1";
    $result = mysqli_query($connection, $select);
}

}

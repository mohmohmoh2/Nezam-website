<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;

class AuthPageController extends Controller
{
    //
    public function index (){
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!(auth()->attempt(['email'=> $data['email'], 'password' => $data['password']]))) {
            # code...
            setcookie('not', 'error', time()+5);
            return back();
        }else {
            return redirect(route('front.homepage'));
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect(route('front.homepage'));
    }

    public function signUpView (){
        return view('signUp');
    }

    public function signUp(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'lName' => 'required',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        //$data['password'] = bcrypt($data['password']);
        $users['users'] = user::select('email')
        ->get();
        $valid = " ";
        foreach ($users as $key => $value) {
            for ($i=0; $i < count($value); $i++) {
                //echo $value[$i]['email'] .'<br>';
                if ($request->email == $value[$i]['email']) {
                    $valid = "not";
                }
            }
        }
        if ($valid == "not") {
            # code...
            setcookie('mail', 'error', time()+5);
            return back();
        }elseif (strlen($request->password) <= 6) {
            setcookie('pass', 'error', time()+5);
            return back();
        }else {
            User::create([
                'name' => $data['name'],
                'lName' => $data['lName'],
                'email' => $data['email'],
                'password' => Hash::make($request->password),
            ]);
            auth()->attempt(['email'=> $data['email'], 'password' => $data['password']]);
            echo $data['email'] .'<br>'.$data['password'];
            //return redirect(route('admin.login'));
        }
        if (!auth()->attempt(['email'=> $data['email'], 'password' => $data['password']])) {
            auth()->attempt(['email'=> $data['email'], 'password' => $data['password']]);
        }else {
            return redirect(route('front.homepage'));
        }
    }
}

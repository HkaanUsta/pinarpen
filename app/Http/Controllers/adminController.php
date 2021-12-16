<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{

    public function dashboard(){
        return view("management_panel.dashboard");
    }

    public function login(){
        return view("management_panel.login");
    }

    public function login_post(Request $request){
        $request->validate(["email"=>"required","password"=>"required"]);
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('/admin/dashboard');
        }
        return redirect()->back()->withErrors('Please check your email/password');
    }

    public function logout(){
        Auth::logout();
        return redirect("/admin/login");
    }
}

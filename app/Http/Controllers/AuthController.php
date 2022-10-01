<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;


class AuthController extends Controller
{ 
     
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);  
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) ) {          
            return redirect('admin/dashboard');
        } 
        return redirect("/")->with('error','Email and/or password invalid.');
        

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');

    }
    public function unique_email(Request $request){
    	$user = User::where('email',$request->email)->first();
    	if($user){
    		echo 'false';
    	}else{
    		echo 'true';
    	}
    }
    
}

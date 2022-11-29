<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{   
  
    public function __construct()
    {
        $this->middleware('auth'); 
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $session_id = session()->getId();
        return $session_id;
        if(Auth::check()){
            return view('vendor_dashboard');
        }
        return redirect("/")->with('error','Opps! You do not have access');
    }

}

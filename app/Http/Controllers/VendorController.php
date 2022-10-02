<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        $this->middleware('admin');
        
    }

    public function dashboard()

    {
        if(Auth::check()){
            return view('vendor_dashboard');
        }
        return redirect("/")->with('error','Opps! You do not have access');
    }

    // public function vendor(){
    //     $vendors = Vendor::all();
    //     return view('');
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {       
        $this->middleware('auth');   
        $this->middleware('vendor');
        
    }

    public function dashboard(){
        $users = DB::table('users')->get();
            return view('admin.dashboard',[
                'users'=>$users
            ]);
        return redirect("/")->with('error','Opps! You do not have access');

    }

    // ADD USER

     public function addUser(UserRequest $request){    
         $validatedData = $request->validated();        
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
                'role' => $request->role
            ]);
            return back()->with('status','User added successfully');
   }

   //EDIT USER

        public function editUser($id){           
            $user = User::find($id);
            return view('admin.dashboard',[
                'user'=>$user
            ]);
        }

   //UPDATE USER

        public function updateUser(Request $request, $id){              
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->update();
            return redirect()->back()->with('status','User Updated Successfully');
            
        }

        public function deleteUser($id){
            User::find($id)->delete();
            return back()->with('status','User Deleted Successfully');
        }

        public function vendor(){
            $vendors = Vendor::all();
            return view('vendor.index',[
                'vendors'=>$vendors
            ]);
        }

    
}

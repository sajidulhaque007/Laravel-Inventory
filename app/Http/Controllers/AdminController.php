<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vendor;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\VendorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;



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
        
        $users = DB::table('users')->where('role','=','user')->get();
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
                'role' => $request->role,
                'created_at' => Carbon::now()
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

    // DELETE USER

        public function deleteUser($id){
            User::find($id)->delete();
            return back()->with('status','User Deleted Successfully');
        }

    

        public function vendor(){
            $vendors = Vendor::with('connect_to_user')->whereHas('connect_to_user', function($query){ 
            return $query->where('role', 'vendor');
            })->get();
            $users   = DB::table('users')->where('role','=','user')->get();
            return view('vendor.index',[
                'vendors'=>$vendors,
                'users'=>$users
            ]);
        }


        public function addVendor(Request $request){
            
        return $request;
            
        $validatedData = $request->validated(); 
        $vendors = vendor::create([
            'user_id' => $request->user_id,
            'date_of_birth' => $request->date_of_birth,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        if($request->hasFile('image')){
            $vendor_image = $request->file('image');
            $image_name   = $vendors->id.".".$vendor_image->extension();
            $image_location = base_path('public/uploads/vendor-image/'.$image_name);
            Image::make($vendor_image)->resize(300,300)->save($image_location,30);
            $vendors->image = $vendor_image;
            $vendors->save();
        }
        return back()->with('status','Vendor Added Successfuly');

    }

        public function editVendor(){

    }
        public function updateVendor(){

    }
        public function deleteVendor(){

    }
}

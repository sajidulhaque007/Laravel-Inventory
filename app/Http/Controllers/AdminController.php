<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\DataTables\UsersDataTable;

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

    public function dashboard()

    {
        
        // $user = User::paginate(10);
        $users = DB::table('users')->get();
        // if(Auth::check()){
            return view('admin.dashboard',[
                'users'=>$users
            ]);
        // }
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
            //    return back()->with('UserAdded','User updated successfully');
        }

        public function deleteUser($id){
            User::find($id)->delete();
            return back()->with('status','User Deleted Successfully');
        }

        public function search(Request $request){     

            $search = $request->input('search');      
            $user = User::query()
                        ->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('body', 'LIKE', "%{$search}%")
                        ->get();           
            return view('admin.dashboard', compact('user'));
        }

        //yajra Datatable

        public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users');
    }

        public function demoTable()
    {
        $user = DB::table('users')->get();
        return view('demo',[
            'user'=>$user
        ]);
    }
}

@extends('layouts.backend-master')

@section('content')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Dashboard</h1>
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}   
                        </div>
                        @endif()
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                      </ol>                       
                        <a style ="margin-bottom: 10px;"                
                        href="#myModal" class="btn btn-info"  data-toggle="modal">Add User</a>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog modal-login">
                                <div class="modal-content">
                                    <div class="modal-header">				
                                        <h4 class="modal-title">Add User</h4>
                                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    </div>
                                <div class="modal-body">
                                    <form  method="POST" action="{{ route('adduser') }}" id="addUser">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                                            @if($errors->any('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                         @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="email" id="email" class="form-control" placeholder="Email" >	
                                            @if ($errors->any('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif				
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password" >					
                                        </div>
                                        <div class="form-group">
                                            <label id="role" name="role" >Select Role:</label>
                                                <select class="form-control" id="role" name="role">
                                                    <option value="user">User</option>
                                                </select>				
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>   

                        {{-- Edit User --}}
                        @foreach ($users as $user) 
                        <div id="modal-edit-users{{ $user->id}}" class="modal fade">
                            <div class="modal-dialog modal-login">
                                <div class="modal-content">
                                    <div class="modal-header">				
                                        <h4 class="modal-title">Edit User</h4>
                                        <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    </div>
                                <div class="modal-body">
                                    <form  method="POST" action="{{ route('update-user',$user->id)}}" id="modal-edit">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="Name">                                      
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Email" readonly>	
                                        </div>
                                        {{-- <div class="form-group">
                                            <label id="role" name="role" >Select Role:</label>
                                                <select class="form-control" id="role" name="role">
                                                    <option value="user">User</option>
                                                    <option value="vendor">Vendor</option>
                                                </select>				
                                        </div> --}}
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                            <div class="card mb-4">
                                <div class="card-header">
                                    List of all Users
                                </div>
                                <div class="card-body">
                                    <table id="myTable" class="ui celled table" style="width:100%">
                                        <thead>                                          
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Start date</th>
                                            <th>Actions</th>                                       
                                       </thead>
                                        <tbody>
                                            @foreach ($users as $user)                                      
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('edit-user',$user->id)}}" data-target="#modal-edit-users{{ $user->id }}" id="modal-edit" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('delete-user',$user->id) }}" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach                                  
                                        </tbody>
                                    </table>
                                </div>
                           </div>

                                <div class="card mb-4" id="add"> 
                                    <div class="card-body">
                                    <h2>Add Vendor</h2>                             
                                        <form class="form-horizontal" action="/action_page.php">
                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                                            <div class="col-sm-10">          
                                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                            </div>
                                            </div>
                                            <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                <label><input type="checkbox" name="remember"> Remember me</label>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>  
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Inventory System 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
@endsection()




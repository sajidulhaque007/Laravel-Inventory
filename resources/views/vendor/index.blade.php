@extends('layouts.backend-master')

@section('content')
@php $i =1; @endphp
    <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}   
                    </div>
                    @endif()
                    <br>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Vendor</li>
                        {{-- <li class="breadcrumb-item active">Dashboard 2</li>
                        <li class="breadcrumb-item active">Dashboard 3</li> --}}
                    </ol>        
                <a style ="margin-bottom: 10px;" href="#/addvendor" class="btn btn-info" >Add Vendor</a> 
                <br>     
                    <div class="card mb-4">
                        <div class="card-header">
                            List of all Vendors
                            
                        </div>
                        <div class="card-body">
                            <table id="myTable" class="mdl-data-table" style="width:100%">
                                <thead>                                          
                                    <th>SL</th>
                                    <th>Vendor ID</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Date Of Birth</th>
                                    <th>Status</th>
                                    <th>Actions</th>                                       
                            </thead>
                                <tbody>
                                    @foreach ($vendors as $vendor)                                      
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $vendor->id }}</td>
                                        <td>{{ $vendor->user_id }}</td>
                                        <td>{{ $vendor->connect_to_user->name }}</td>
                                        <td>{{ $vendor->connect_to_user->role }}</td>
                                        <td> 
                                            <img width="80"  src="{{ asset('public/uploads/vendor-image') }}/{{ $vendor->image }}" alt="{{ $vendor->image }}">
                                        </td>
                                        <td>{{ $vendor->connect_to_user->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($vendor->date_of_birth)->format('M j Y') }}</td>
                                        <td>{{ $vendor->status }}</td>
                                        <td>
                                            <a href="{{ route('edit-vendor',$vendor->id)}}"class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delete-vendor',$vendor->id) }}" onclick="return confirm('Are you sure you want to delete this vendor?');" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach                                  
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="card mb-4" id="/addvendor"> 
                            <div class="card-body">
                                <h2>Add Vendor</h2>                             
                                <form method="post" class="form-horizontal" action="{{ route('add-vendor') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                    <label class="control-label col-sm-2">User Name</label>
                                    <div class="col-sm-10">
                                        <select name="user_id" class="form-control">
                                            <option value="" >-Select user-</option>
                                            @foreach ($users as $user)                    
                                            <option value="{{ $user->id}}">{{ $user->name }}</option>
                                            @endforeach                      
                                        </select>
                                        @if($errors->any('user_id'))
                                        <span class="text-danger">{{$errors->first('user_id')}}</span>
                                            @endif
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-sm-2">Date Of Birth:</label>
                                    <div class="col-sm-10">          
                                        <input type="date" class="form-control" max={{ \Carbon\carbon::now()->format('Y-m-d') }}  name="date_of_birth" value="{{ old('date_of_birth') }}">
                                        @if($errors->any('date_of_birth'))
                                        <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
                                            @endif
                                    </div>
                                    </div>
                                    <div class="form-group">        
                                        <label class="control-label col-sm-2" >Image:</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image">
                                            @if($errors->any('image'))
                                            <span class="text-danger">{{$errors->first('image')}}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="checkbox" class="checkoption" value="1" > Option1 <br>
                                            <input type="checkbox" class="checkoption" value="2" > Option2 <br>
                                            <input type="checkbox" class="checkoption" value="3" > Option3 <br>
                                            <input type="checkbox" class="checkoption" value="4" > Option4 <br>
                                            <input type="checkbox" class="checkoption" value="5" > Option5 <br>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                                <label name="status">Select Status:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>	
                                                    @if($errors->any('status'))
                                                    <span class="text-danger">{{$errors->first('status')}}</span>
                                                        @endif
                                                </div>		
                                        </div>
                                    <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">Submit</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.checkoption').click(function() {
            $('.checkoption').not(this).prop('checked', false);
        });
     });
</script>
@endsection()


    @extends('layouts.backend-master')

    @section('content')

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
                                <li class="breadcrumb-item"><a href="{{ route('vendor') }}">Vendor</a></li>
                                <li class="breadcrumb-item active">Add Vendor</li>
                            </ol>              
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


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('dashboard_assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard_assets/css/modal.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    
    <title>Inventory</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <h3 class="mt-5" style="margin-left: 5rem;margin-bottom: 2rem;">Inventory System</h3>
                <div class="card bg-light mb-3"  style="width: 25rem;">
                <div class="card-header" style="padding-left: 9rem;">System Login</div>
                    <div class="card-body">

                    {{-- @if(Session::has('error'))
                      <div class="alert alert-danger">
                          {{ Session::get('error') }}
                          @php
                              Session::forget('error');
                          @endphp
                      </div>
                      @endif --}}
                    <form method="POST" action="{{ route('login') }}" id="login">
                      @csrf                  
                        <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                            @if ($errors->any('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            @if ($errors->any('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    </div>
                </div>
            </div>
       </div>
    </div>

    <script type="text/javascript">
      window.baseUrl="{{URL::to('/')}}";
     </script>
    <script src="{{ asset('dashboard_assets/js/scripts.js')}}"></script>
    <script src="{{ asset('dashboard_assets/js/auth.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

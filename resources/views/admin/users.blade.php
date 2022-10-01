@extends('layouts.backend-master')

@section('content')

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                                              
                                  
                        <div class="mt-5">
                            <h1 class="mb-5">Laravel 9 with Yajro Datatables</h1>
                            {{ $dataTable->table() }}
                            
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
@endsection('')
@push('scripts')
    {{$dataTable->scripts()}}
@endpush
<!-- <h2>this is the admin dashboard</h2>
<li class="nav-item">
<a class="nav-link" href="{{ route('logout') }}">Logout</a>
</li> -->
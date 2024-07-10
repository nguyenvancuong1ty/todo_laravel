<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="/css/app.css"> 
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src= "/js/app.js"> </script>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark py-4">
  <div class="container d-flex justify-content-between" >
    <div class= "nav-page d-flex">
        
        <div class="nav-page-item">
            <a class="navbar-brand text-light" href="{{route('auth.listUses')}}">Users</a>
        </div>
        <div class="nav-page-item">
            <a class="navbar-brand text-light" href = "{{route('category.Index')}}" >Category</a>
        </div>
        <div class="nav-page-item">
           <a class="navbar-brand text-light" href="{{ route('post.index', ['status' => 'active', 'limit' => 2]) }}">Post</a>
        </div>
     </div>
     <div class="nav-action">
        <div class="nav-page-item">
        @if (auth()->check()) 
            <div class="d-flex align-items-center">
                <p class="text-light me-3 fw-bold">{{auth()->user()->name}}</p>
                <a class="navbar-brand text-light btn btn-success" href="javascript:" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <form class="modal-dialog" method="post" action = "{{route('auth.postLogout')}}">
            @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-danger fw-bold" id="logoutModalLabel">Logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body fw-bold">
                        Logout confirmation
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="text-light btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="text-light btn btn-success">Ok</button>
                    </div>
                    </div>
                </form>
            </div>
        @else 
            <a class="navbar-brand btn btn-success" href="{{route('auth.getLogin')}}">Login</a>
            <a class="navbar-brand btn btn-success" href="{{route('auth.getRegister')}}">Register</a>
        @endif
        
        </div>
     </div>
  </div>
</nav>

<div class="container">

@yield('content')
@if (session('error'))
        <!-- <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger fw-bold" id="errorModalLabel">Error message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fw-bold">
                {{ session('error') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                <strong class="me-auto text-danger">Error</strong>
                <small class="text-danger">just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-danger fw-bold">
                {{ session('error') }}
                </div>
            </div>
        </div>
@endif
@if(session()->has('success'))
        <!-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success fw-bold" id="successModalLabel">Success message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fw-bold">
            {{ session()->get('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div> -->
        
        <!--  -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                <strong class="me-auto text-success">Success</strong>
                <small class="text-success">just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-success fw-bold">
                {{ session()->get('success') }}
                </div>
            </div>
        </div>
@endif

@if ($errors->has('error') || session('error'))
<script>
    $(document).ready(function() {
        var toastEl = $('#liveToast')[0];
        var toast = new bootstrap.Toast(toastEl, {
            autohide: true,
            delay: 4000 
        } );
        toast.show();
    });
</script>
@endif


@if(session()->has('success'))
<script>
    // $(document).ready(function() {
    //     $('#successModal').modal('show');
    // });
    $(document).ready(function() {
        var toastEl = $('#liveToast')[0];
        var toast = new bootstrap.Toast(toastEl, {
            autohide: true,
            delay: 4000 
        } );
        toast.show();
    });
</script>
@endif
</div>

</body>

</html>
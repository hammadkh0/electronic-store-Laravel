<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" class='p-3' href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" class='p-3' href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="">
    
    <header class="header">
        <nav class="navbar">
            <a href="/" class="nav-logo">Home.</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{route('dashboard',auth()->user())}}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#products" class="nav-link">Products</a>
                </li>
                @if(Auth::guard('user')->user() or Auth::guard('admin')->user())
                    @if(Route::is('users.home'))
                        <li class="nav-item">
                            <a class="nav-link" href="">{{Auth::guard('user')->user()->name}}</a>
                        </li>
                    @elseif(Route::is('admin.home'))
                        <li class="nav-item">
                            <a class="nav-link" href="">{{Auth::guard('admin')->user()->name}}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method = 'post' class='inline'>
                            @csrf
                            <button class="nav-link" type='submit'>Logout</button>
                        </form>  
                    </li>
                @endif
                
                @if(!(Auth::guard('user')->user() or Auth::guard('admin')->user()))
                    <li class="nav-item">
                        @if(Route::is('users.home'))
                            <a href="{{ url('/login/user') }}" class="nav-link">Login</a>
                        @else
                            <a href="{{ url('/login/admin') }}" class="nav-link">Login</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Route::is('users.home'))
                            <a href="{{ url('register/user') }}" class="nav-link">Register</a>
                        @else
                            <a href="{{ url('register/admin') }}" class="nav-link">Register</a>
                        @endif

                    </li>
                    @endguest
            

            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
@yield('content')
<script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>
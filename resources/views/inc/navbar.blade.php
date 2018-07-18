<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>RentOut</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="/css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="/css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12 dark-bg">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src= "/images/Logo6.png" style="width:110px;height:60px;"/>
                                {{-- {{ config('app.name', 'RentOut') }} --}}
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav"></ul>
                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                        <ul class="navbar-nav">
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/post">Dashboard</a>
                                                </li>
                                            </ul>
                <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item"><a class="btn btn-outline-light top-btn" href="{{ route('login') }}">Login</a></li>
                                        <li class="nav-item"><a class="btn btn-outline-light top-btn" href="{{ route('register') }}">Register</a></li>
                                        @else
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="/dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                                    {{--  Property Specialist  --}}                                                    
                                                    @if(Auth::user()->types['id'] == 2)
                                                        <a class="dropdown-item" href="/dashboard">Posts</a>
                                                        <a class="dropdown-item" href="/profile">Profile</a>
                                                        <a class="dropdown-item" href="/excel">Generate Report</a>
                                                    {{--  Admin  --}}
                                                    @elseif(Auth::user()->types['id'] == 3)
                                                        <a class="dropdown-item" href="/admin">admin</a>
                                                    {{--  Customer  --}}
                                                    @elseif(Auth::user()->types['id'] == 1)
                                                        <a class="dropdown-item" href="/profile">Profile</a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                    @endguest
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
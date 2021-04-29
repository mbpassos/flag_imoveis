<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Flag Imóveis</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}" >

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

        <!-- Swiper CSS-->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
    <body>
        <header class="header">
            <div class="container">
                <!--Navbar-->
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#"><span class="color-primary">F.</span>Imóveis</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fas-fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="basicExampleNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                            @auth
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                <button class="btn-theme"><a class="link-btn" href="{{ route('register') }}">Register</a></button>
                                @endif
                                </li>
                            @endauth
                        @endif
                        </ul>

                    </div>
                </nav>
            </div>
        </header>
        @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="mainText"><h3 style="font-weight: 700">Find the property of your dreams <br>at <span style="color: #2289FF">Flag</span> Imóveis!</h3>
        </div>
        <div>
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1497465689543-5940d3cede89?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="Third slide" height="400">
        </div>
        <div class="container-fluid" style="margin-top: 80px">
           <div class="row">
               @foreach($properties as $property)
               <div class="col-md-4" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $property->photo }}" alt="Card image cap" width="311" height="270">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ $property->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $property->address }}</li>
                        <li class="list-group-item">{{ $property->city }}</li>
                        <li class="list-group-item">{{ $property->price }}</li>
                    </ul>
                    <div class="card-body">
                        <div class="col-lg-8">
                        <a class="btn-theme" href="{{ Route('properties.show', $property->id) }}" title="New Offer"> Make an offer! </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


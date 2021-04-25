<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

        <!-- Bootstratp -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


           <div>
                <a href="/about" class="text-sm text-gray-700 underline">About bla</a>
               @foreach($properties as $property)
               <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $property->photo }}" alt="Card image cap">
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
                        <div class="col-lg-6 pull-right">
                        <a class="btn btn-success" href="{{ Route('properties.show', $property->id) }}" title="New Offer"> Make an offer! </a>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </body>
</html>


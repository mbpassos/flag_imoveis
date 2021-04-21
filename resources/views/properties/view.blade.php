<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Property') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Property') }}</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6" >
                                                <img src="{{ $property->photo }}" alt="">
                                            </div>
                                            <div class="col-sm-6 col-md-7">
                                                <h4><strong>{{ $property->title }}</strong></h4>
                                                <h5>{{ $property->user->name ?? '' }}</h5>
                                                <hr>
                                                <p>
                                                    {{ $property->description }}<br>
                                                    <small><cite title="San Francisco, USA">{{ $property->address }} - {{ $property->city }} - {{ $property->price }}</cite></small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pull-right">
                                    <a class="btn btn-success" href="" title=""> Add to Wishlist!</a>
                                </div>
                                <div class="col-lg-6 pull-right">
                                     <a class="btn btn-success" href="{{ Route('offers.create') }}" title="New Offer"> Make an offer! </a>
                                </div>
                                <div class="col-lg-6 pull-right">
                                    <a class="btn btn-success" href="{{ Route('appointments.create') }}" title="New Appointment"> Make an Appointment!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

































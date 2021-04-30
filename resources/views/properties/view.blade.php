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
                                            <div class="col-sm-6">
                                                <h4><strong>{{ $property->title }}</strong></h4>
                                                <h5>{{ $property->user->name ?? '' }}</h5>
                                                <hr>
                                                <p>
                                                    {{ $property->description }}<br>
                                                    <small><cite title="San Francisco, USA">{{ $property->address }} - {{ $property->city }} - {{ $property->price }}</cite></small>
                                                </p>
                                                @can("clientRole")
                                                <div>
                                                <form method="POST" action="{{ route('wishlist.store')}}">
                                                    @csrf
                                                    <input style="display: none" type="text" name="property_id" value="{{$property->id}}">
                                                    <button type="submit" class="btn btn-light">
                                                    {{ __('Add to Wishlist!') }}
                                                    </button>
                                                </form>
                                                <a class="btn btn-light mt-1" href="{{ Route('appointments.create') }}" title="New Appointment"> Make an Appointment!</a>
                                                @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 50px">
                                <form method="POST" action="{{ route('offers.store') }}">
                                     @csrf
                                    <input style="display: none" type="text" name="property_id" value="{{$property->id}}" >
                                    <div class="form-group row">
                                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Make offer:') }}</label>
                                        <div class="col-md-6">
                                            <input type="number" name="price" value="" placeholder="Insert amount here!">
                                        </div>
                                    </div>
                                    <input style="display: none" type="text" name="user_id" value="{{auth()->user()->id}}">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                            {{ __('Submit Offer') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

































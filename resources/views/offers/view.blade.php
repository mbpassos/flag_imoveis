<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offer') }}
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
                                    <div class="card-header">{{ __('Offer') }}</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-7">
                                                <h4><strong>{{ $offer->user->name }}</strong></h4>
                                                <h5>{{ $offer->property->title }}</h5>
                                                <hr>
                                                <p>{{ $offer->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




















<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offers') }}
        </h2>
    </x-slot>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Client</td>
                                <td>Property</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td>{{ $offer->user->name }}</td>
                                <td>{{ $offer->property->title }}</td>
                                <td>{{ $offer->price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

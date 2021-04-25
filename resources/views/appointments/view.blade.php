<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment') }}
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
                                    <div class="card-header">{{ __('Appointment') }}</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-7">
                                                <h4><strong>{{ $appointment->property->title }}</strong></h4>
                                                <h5>{{ $appointment->user->name ?? '' }} - {{ $appointment->user->telephone ?? ''}}</h5>
                                                <hr>
                                                <p>
                                                    {{ $appointment->information }}<br>
                                                    <small><cite title="San Francisco, USA">{{ $appointment->property->address ?? '' }}</cite></small>
                                                </p>
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

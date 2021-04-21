<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>Agent</td>
                                <td>Photo</td>
                                <td>Price</td>
                                <td>Address</td>
                                <td>City</td>
                                <td>Description</td>
                                <td>Date</td>
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->user->name ?? '' }}</td>
                                <td>{{ $property->photo }}</td>
                                <td>{{ $property->price }}</td>
                                <td>{{ $property->address }}</td>
                                <td>{{ $property->city }}</td>
                                <td>{{ $property->description }}</td>
                                <td>{{ $property->date }}</td>

                            </tr>
                        </tbody>
                    </table>
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
</x-app-layout>

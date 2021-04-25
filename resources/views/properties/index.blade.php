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
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    @can('agentRole')
                    <div class="col-lg-6 pull-right">
                        <a class="btn btn-success" href="{{ Route('properties.create') }}" title="New Property"> Add Property</a>
                    </div>
                    @endcan
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Photo</td>
                                <td>Title</td>
                                <td>Agent</td>
                                <td>Price</td>
                                <td>Address</td>
                                <td>City</td>
                                <td>Date</td>
                                @can('agentRole')
                                <td>Ações</td>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($properties as $property)
                            <tr>
                                <td> <img src="{{ $property->photo ?? ''}}" height="100px" width="100px" border-radius = "50%"></td>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->user->name ?? '' }}</td>
                                <td>{{ $property->price }}</td>
                                <td>{{ $property->address }}</td>
                                <td>{{ $property->city }}</td>
                                <td>{{ $property->date }}</td>
                                @can('agentRole')
                                <td style="text-align: center; min-width:175px;">
                                    <a class="btn btn-small btn-success" href="{{ Route('properties.show', $property->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-small btn-info" href="{{ Route('properties.edit', $property->id) }}"><i class="fa fa-edit"></i></a>
                                    <form style="display:inline" method="Post" action="{{ route('properties.destroy', $property->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

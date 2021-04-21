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
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Client</td>
                                <td>Property</td>
                                <td>Date</td>
                                @can('agentRole')
                                <td>Action</td>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->user->name }}</td>
                                <td>{{ $appointment->property->title }}</td>
                                <td> Date </td>
                                @can('agentRole')
                                <td style="text-align: center; min-width:175px;">
                                    <a class="btn btn-small btn-success" href="{{ Route('appointments.show', $appointment->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-small btn-info" href="{{ Route('appointments.edit', $appointment->id) }}"><i class="fa fa-edit"></i></a>
                                    <form style="display:inline" method="Post" action="{{ route('appointments.destroy', $appointment->id) }}">
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

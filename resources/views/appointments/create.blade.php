<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('appointments.store') }}">
                            @csrf

                       <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                            <div class="col-md-6">

                                <select class="custom-select" name="user">
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name}} </option>
                                    @endforeach
                                </select>


                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="property" class="col-md-4 col-form-label text-md-right">{{ __('Property') }}</label>

                            <div class="col-md-6">

                                <select class="custom-select" name="property">
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}"> {{ $property->title}} </option>
                                @endforeach
                                </select>


                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                            <label for="information" class="col-md-4 col-form-label text-md-right">{{ __('Information') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('information') is-invalid @enderror" id="information" name="information" placeholder="Information about the appointment" value="{{ old('information') }}" required autocomplete="information" autofocus>
                                @error('information')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add new Appointment') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

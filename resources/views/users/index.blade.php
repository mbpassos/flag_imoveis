<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div class="col-lg-6 pull-right">
                        <a class="btn btn-success" href="{{ Route('users.create') }}" title="New User">Add New User</a>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Telephone</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Management</td>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            @foreach($role->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->telephone}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $role->name }}</td>
                                <td style="text-align: center; min-width:175px;">
                                    <a class="btn btn-small btn-success" href="{{ Route('users.show', $user->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-small btn-info" href="{{ Route('users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                                    <form style="display:inline" method="Post" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

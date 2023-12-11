<x-layout>

    <x-slot name="title">
        Show all users
    </x-slot>

<div class="container mt-5 bg-white" style="width: 900px; padding: 3rem;" >

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @can('create-post')
        <a class="btn btn-primary float-end mb-3" href="/users/create">Create new user</a>
    @endcan
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>Roles</th>
            <th>Created on</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>-</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="/users/{{ $user->id }}/edit">edit</a>
                    <a href="/users/{{ $user->id }}/delete">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    {{ $users->links() }}

</div>
</x-layout>

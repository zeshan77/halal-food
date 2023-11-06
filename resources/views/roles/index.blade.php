<x-layout>

    <x-slot name="title">
        Show all roles
    </x-slot>

<div class="container mt-5 bg-white" style="width: 900px; padding: 3rem;" >

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @can('create-post')
        <a class="btn btn-primary float-end mb-3" href="/roles/create">Create new role</a>
    @endcan
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Slug</th>
            <th>Name</th>
            <th>Permissions</th>
            <th>Created on</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->slug }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @foreach($role->permissions as $permission)
                        <span class="badge bg-primary">{{ $permission->slug }}</span>
                    @endforeach
                </td>
                <td>{{ $role->created_at }}</td>
                <td>
                    <a href="/roles/{{ $role->id }}/edit">edit</a>
                    <a href="/roles/{{ $role->id }}/delete">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    {{ $roles->links() }}

</div>
</x-layout>

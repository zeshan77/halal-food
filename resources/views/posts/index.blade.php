<x-layout>

    <x-slot name="title">
        Show all posts
    </x-slot>

<div class="container mt-5 bg-white" style="width: 900px; padding: 3rem;" >

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @can('create-post')
        <a class="btn btn-primary float-end mb-3" href="/posts/create">Create new post</a>
    @endcan
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created on</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['body'] }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                    @can('update', $post)
                        <a href="/posts/{{ $post['id'] }}/edit">edit</a> -
                    @endcan

                    @can('delete', $post)
                        <a href="/posts/{{ $post['id'] }}/delete">delete</a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    {{ $posts->links() }}

</div>
</x-layout>

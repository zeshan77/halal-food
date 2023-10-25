<x-layout>
<div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >

    <h2 class="mb-5">Edit post</h2>

    <form action="/posts/{{ $post['id'] }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label class="mb-1" for="title">Title</label>
            <input name="title"  class="form-control" id="title" value="{{ old('title', $post['title']) }}">
            @error('title')
            <p class="text-danger text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label class="mb-1" for="body">Body</label>
            <textarea rows="5" id="body" class="form-control" name="body">{{ old('body', $post['body']) }}</textarea>
            @error('body')
            <p class="text-danger text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-layout>

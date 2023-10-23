<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-light">
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
</body>
</html>

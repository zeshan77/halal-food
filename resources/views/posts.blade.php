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

        <h2 class="mb-5">Create new post</h2>
{{--        @if($errors->any())--}}
{{--            <p class="text-danger">Please fix the following errors</p>--}}
{{--            <ul class="text-danger">--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li class="mt-1">{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endif--}}

        <form action="/posts" method="post">
            @csrf
            <div class="form-group mb-4">
                <label class="mb-1" for="title">Title</label>
                <input name="title"  class="form-control" id="title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label class="mb-1" for="body">Body</label>
                <textarea rows="5" id="body" class="form-control" name="body">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

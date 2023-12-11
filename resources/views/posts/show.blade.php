<x-layout>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >

        <div class="w-1/2">
            <img style="width: 100%; margin-bottom: 3rem; border-radius: 5px;" class="w-full" src="/{{ $post->picture }}" alt="">
        </div>
        <h2 class="mb-5">{{ $post->title }}</h2>

        <p>{!! $post->body !!}</p>
    </div>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >
        <h4>Comments</h4>
        <div class="list-group">

            @forelse($post->comments as $comment)
                <div class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="mb-1">{{ \Illuminate\Support\Str::words($comment->body, 5) }}</div>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>

                    {{--                <small>{{ $comment->user->name }}</small> --}}
                </div>

            @empty
            @endforelse

        </div>
    </div>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >
        <h4 class="mb-5">Post your comment</h4>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <form action="/posts/{{ $post->id }}/comments" method="post">
            @csrf
            <div class="form-group mb-5">
                <label class="mb-1" for="body">Body</label>
                <textarea rows="5" id="body" class="form-control" name="body">{{ old('body') }}</textarea>
                @error('body')
                <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <x-button label="Submit" />
        </form>
    </div>
</x-layout>

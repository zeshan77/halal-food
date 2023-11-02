<x-layout>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >

        <h2 class="mb-5">{{ $post->title }}</h2>

        <p>{!! $post->body !!}</p>
    </div>
</x-layout>

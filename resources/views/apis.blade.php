<x-layout>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >

        <h2 class="mb-5">Github repos</h2>

        <ul>
            @forelse($repos as $repo)
                <li>{{ $repo['name'] }}</li>
            @empty
                <li>No repos found.</li>
            @endforelse
        </ul>

        <hr>

        <h2>Weather</h2>
        <div>
            <span>{{ $weather['name'] }}</span>:
            <span>{{ $weather['weather'][0]['description'] }}</span>
        </div>

        <hr>
        <h2>Popular movies</h2>
        <ul>
            @forelse($movies as $movie)
                <li>{{ $movie['title'] }}</li>
            @empty
                <li>No movies found.</li>
            @endforelse
        </ul>
    </div>

</x-layout>

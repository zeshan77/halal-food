<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class APIsController extends Controller
{
    public function __invoke()
    {
        $responses = Http::pool(function (Pool $pool) {
            return [
                $pool->as('github')->get('https://api.github.com/users/AAMIRSHEHZAD6674/repos'),
                $pool->as('weather')->get('https://api.openweathermap.org/data/2.5/weather?q=Peshawar,pk&APPID=3752d69d1a04fe35566da4a17987d9b3'),
                $pool->as('movies')->withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiODIzZjFjNDc5MTc1Zjg2OTIzNTEzNjY0OGY0ZjFhNiIsInN1YiI6IjY1NWM2MTkzMTA5MjMwMDBhYjQ5OTg1YyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.o8SW9fnlPX7-j9glQFXnhFrrXbvuPM8VPmU6_Ldz_RM')
                    ->get('https://api.themoviedb.org/3/movie/popular'),
            ];
        });

        return view('apis', [
            'repos' => $responses['github']->json(),
            'weather' => $responses['weather']->json(),
            'movies' => $responses['movies']->json('results'),
        ]);
    }
}

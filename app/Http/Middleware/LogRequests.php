<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    public function handle(Request $request, Closure $next): Response
    {
        // logic
        return $next($request);
    }

    public function terminate(Request $request, \Illuminate\Http\JsonResponse $response)
    {
        logger('capture request and response', [
            $request->ip(),
            $request->header(),
            $request->all(),
            $response->content()
        ]);

    }
}

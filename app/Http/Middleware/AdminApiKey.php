<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminApiKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->header('X-Admin-Key');

        if ($key !== config('app.admin_api_key')) {
            return response()->json([
                'message' => 'Accesso non autorizzato.',
            ], 401);
        }

        return $next($request);
    }
}

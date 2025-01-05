<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictToCornjob
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Allowed User-Agent
        $allowedUserAgent = 'Mozilla/4.0 (compatible; cron-job.org; http://cron-job.org/abuse/)';

        // Check if User-Agent matches
        if ($request->header('User-Agent') !== $allowedUserAgent) {
            return response()->view('errors.401', [], 301);
        }

        return $next($request);
    }
}

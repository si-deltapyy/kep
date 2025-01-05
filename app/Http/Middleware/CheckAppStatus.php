<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckAppStatus
{
    public function handle(Request $request, Closure $next)
    {
        $isDown = DB::table('management')->value('is_down');

        // Daftar route yang dikecualikan
        $excludedRoutes = [
            'artisan/run',
            'artisan/down',
            'artisan/up',
        ];

        // Jika aplikasi dalam mode down dan route tidak termasuk dalam pengecualian
        if ($isDown && !$this->isExcludedRoute($request->path(), $excludedRoutes)) {
            return response()->view('errors.down', [], 503);
        }

        return $next($request);
    }

    private function isExcludedRoute($path, $excludedRoutes)
    {
        foreach ($excludedRoutes as $route) {
            if (fnmatch($route, $path)) {
                return true;
            }
        }
        return false;
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $logMessage = '[' . now()->format('Y-m-d H:i:s') . '] ';
        $logMessage .= 'Request from ' . $request->ip() . ' to ' . $request->fullUrl() . ' using ' . $request->method();
        Log::channel('all')->info($logMessage);
        return $next($request);
    }
}

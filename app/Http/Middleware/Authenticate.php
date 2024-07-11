<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
 
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // app/Http/Middleware/RedirectIfAuthenticated.php
    
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            return route('auth.getLogin');
        }
        
    }

}

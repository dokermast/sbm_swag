<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    public function handle($request, Closure $next)
    {
        if(!session('token')){

            return redirect('/')->withErrors(['error' => 'You aren\'t logged in']);
        }

        return $next($request);
    }
}

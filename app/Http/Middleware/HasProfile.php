<?php

namespace App\Http\Middleware;

use Closure;

class HasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!\Auth::user()->profile) {
            return redirect()->route('fill-profile');
        }
        return redirect()->route('frontend.dash');
    }
}
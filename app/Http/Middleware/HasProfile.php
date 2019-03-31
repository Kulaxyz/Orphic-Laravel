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
        $user_id = \Auth::user()->id;
        if () {
            return redirect()->route('fill-profile');
        }
        return redirect()->route('frontend.dash');
    }
}

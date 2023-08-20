<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;

class ApiLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('locale'))
        {
            App::setLocale($request->locale);
        }
        return $next($request);
    }
}

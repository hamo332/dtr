<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Installation
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
        if(!self::checkDbConnection() || !self::checkInstalledFile())
        {
            return redirect()->route('install');
        }

        return $next($request);
    }

    protected function checkDbConnection() {
        if(!empty(env('DB_USERNAME')) && !empty(env('DB_DATABASE')))
        {
            if(@mysqli_connect('localhost', env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE')))
            {
                return true;
            }
        }
        return false;
    }

    protected function checkInstalledFile()
    {
        $installed = DB::table('general_settings')->count();
        return  $installed >= 1 ? true : false;
    }
}

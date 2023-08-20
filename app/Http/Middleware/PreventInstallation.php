<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PreventInstallation
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
        if(self::checkDbConnection())
        {
            return redirect()->route('home');
        }

        return $next($request);
    }

    protected function checkDbConnection() {
        try {
            if(@mysqli_connect('localhost', env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE')))
            {
                $installed = DB::table('general_settings')->count();
                return  $installed >= 1 ? true : false;
            }
        } catch (\Throwable $th) {
            return false;
        }
        
        return false;
    }
}

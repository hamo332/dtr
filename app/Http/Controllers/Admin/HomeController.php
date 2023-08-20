<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    function index(Request $request)
    {
        $lang = $request->lang ?? App::getLocale();
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => 'admin.home'],
            ['name' => __('admin.dashboard'), 'link' => ''],
        ];

        $logs = Log::all();

        return view('admin.dashboard', compact('breadcrumbs', 'lang', 'logs'));
    }

    function qrScanned(Request $request)
    {
        $user = User::where('qrcode', $request->code)->first();
        $log = Log::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        if($log === null)
        {
            $log = new Log();
            $log->user_id = $user->id;
            $status = 'success';
            $message = __('logs.logged_in');
        }
        else
        {
            if($log->time_out !== null)
            {
                $log = new Log();
                $log->user_id = $user->id;
                $status = 'success';
                $message = __('logs.logged_in');
            }
            else
            {
                $log->time_out = Carbon::now();
                $status = 'error';
                $message = __('logs.logged_out');
            }
        }
        
        $log->save();
        
        $request->session()->flash($status, $message);

        $jsondata = array('status' => 'success');

        return response()->json($jsondata);
    }
}

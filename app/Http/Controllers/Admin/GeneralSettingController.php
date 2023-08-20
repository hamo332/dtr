<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Responses\Common\CommonResponse;


class GeneralSettingController extends Controller
{
    public function index()
    {
        $breadcrumbs = [['name' => __('admin.home'), 'link' => '/'],['name' => __('admin.gs_title')]];
        return view('admin.settings.general',['breadcrumbs' => $breadcrumbs]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'site_name' => 'required|min:4',
            'site_timezone' => 'required|string',
            'logo' => 'required',
            'favicon' => 'required',
            'appleicon' => 'required',
            'site_close_message' => Rule::requiredIf(function () use ($request) {
                return $request->site_status == 'on' ? false : true;
            }),

        ]);

        $data = $request->only('site_name','logo','favicon','appleicon','site_close_message', 'site_status','site_timezone', 'site_default_lang');
        
        foreach ($data as $key => $value) {
            $value = ($key == 'site_close_message' && $request->site_status == 'on') ? 'close meassage' : $value;
            GeneralSetting::updateOrCreate(
                ['name' => $key, 'locale' => $request->locale],
                ['value' => $value]
            );
        }

        Cache::flush();
        
        // set timezone to .env file 
        setEnv(['APP_TIMEZONE' => $data['site_timezone']]);
        // set timezone to .env file 
        setEnv(['APP_DEFAULT_LANG' => $data['site_default_lang']]);
        
        $request->session()->flash('success', __('notifications.site_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.site_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }
}

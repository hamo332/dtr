<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Responses\Common\CommonResponse;
use Illuminate\Support\Facades\Cache;

class LanguageController extends Controller
{
    function changeLanguage(Request $request, $locale)
    {
        if(in_array($locale,['ar','en','fr']))
        {
            App::setLocale($locale);
            $request->session()->put('locale', $locale);
            $request->session()->flash('success', __('notifications.language_changed'));
            
            Cache::flush();

            //reponse payload
            $payload = [
                'status' => 'success',
                'redirect_url' => url()->previous(),
                'message' => __('notifications.site_settings_updated'),
            ];

            //generate a response
            return new CommonResponse($payload);
        }
        else{
            abort('404');
        }
    }
}

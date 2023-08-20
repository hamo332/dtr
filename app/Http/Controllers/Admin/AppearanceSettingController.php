<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use App\Models\GeneralSetting;
use App\Http\Controllers\Responses\Common\CommonResponse;

class AppearanceSettingController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->lang ?? 'ar';
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.appearance_settings'), 'link' => route('admin.appearance_settings')],
            ['name' => __('admin.appearance_settings')]
        ];
        return view('admin.design.appearance.index',['breadcrumbs' => $breadcrumbs,'lang' => $lang]);
    }

    public function meatData(Request $request)
    {
        $data = $request->validate([
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'meta_img' => 'required|numeric',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);

        $data = $request->only('meta_title','meta_description','meta_keywords','meta_img');
        
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.appearance_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.appearance_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function cookiesData(Request $request)
    {
        $data = $request->validate([
            'cookies_status' => 'required|accepted',
            'cookies_text' => 'string',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);

        $data = $request->only('cookies_status','cookies_text');
        
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.appearance_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.appearance_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function additionalScript(Request $request)
    {
        // $data = $request->validate([
        //     'head_script' => 'starts_with:<link,<script|ends_with:>',
        //     'footer_script' => 'starts_with:<link,<script|ends_with:>'
        // ]);

        $data = $request->only('head_script','footer_script');
        
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.appearance_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.appearance_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function store($data,$request)
    {
        foreach ($data as $key => $value) {
            if($value != null)
            {
                GeneralSetting::updateOrCreate(
                    ['name' => $key, 'locale' => $request->locale],
                    ['value' => $value]
                );
            }
        }
    }
}

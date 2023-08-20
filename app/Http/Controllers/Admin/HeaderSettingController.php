<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Responses\Common\CommonResponse;


class HeaderSettingController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'home', 'link' => '/'],
            ['name' => 'design', 'link' => 'design'],
            ['name' => 'header']
        ];
        return view('admin.design.header.index',['breadcrumbs' => $breadcrumbs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'header_logo' => 'required|numeric',
            'language_changer' => 'required',
            'menu' => 'array'
        ]);

        $data = $request->only('header_logo','language_changer','header_baner','baner_link','menu');
        
        foreach ($data as $key => $value) {
            $value = $key == 'menu' ? json_encode($value) : $value;
            if($value !== null && !empty($value))
            {
                GeneralSetting::updateOrCreate(
                    ['name' => $key, 'locale' => $request->locale],
                    ['value' => $value]
                );
            }
        }

        Cache::flush();
        
        $request->session()->flash('success', __('notifications.header_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.header_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function storeSlider(Request $request)
    {
        $request->validate([
            'slider' => 'required|array'
        ]);

        $slider = json_encode($request->slider);
        GeneralSetting::updateOrCreate(
            ['name' => 'slider', 'locale' => $request->locale],
            ['value' => $slider]
        );

        Cache::flush();
        
        $request->session()->flash('success', __('notifications.header_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.header_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }
}

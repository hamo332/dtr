<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Responses\Common\CommonResponse;

class SocialMediaController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->lang ?? 'ar';
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => route('admin.home')],
            ['name' => __('admin.social_settings'), 'link' => route('admin.social.logins')],
            ['name' => __('admin.sm_logins_title')]
        ];
        return view('admin.social.logins.index',['breadcrumbs' => $breadcrumbs,'lang' => $lang]);
    }

    public function store(Request $request)
    {
        $data = $request->only('facebook','twitter','google');
        if($request->facebook)
        {
            $data['facebook'] = json_encode($data['facebook']);
        }
        if($request->google)
        {
            $data['google'] = json_encode($data['google']);
        }
        if($request->twitter)
        {
            $data['twitter'] = json_encode($data['twitter']);
        }
        
        $this->dbStore($data);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.socialmedia_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.socialmedia_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function facebookIndex(Request $request, $type)
    {
        $lang = $request->lang ?? 'ar';
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => route('admin.home')],
            ['name' => __('admin.social_settings'), 'link' => route('admin.social.logins')],
            ['name' => __('admin.sm_'.$type.'_title')]
        ];
        return view('admin.social.facebook.'.$type, ['breadcrumbs' => $breadcrumbs,'lang' => $lang, 'page' => $type]);
    }

    public function facebookStore(Request $request)
    {
        $data = $request->only('facebook_pixel','facebook_chat','facebook_comment');

        if($request->facebook_pixel)
        {
            $data['facebook_pixel'] = json_encode($data['facebook_pixel']);
        }
        if($request->facebook_chat)
        {
            $data['facebook_chat'] = json_encode($data['facebook_chat']);
        }
        if($request->facebook_comment)
        {
            $data['facebook_comment'] = json_encode($data['facebook_comment']);
        }
        
        $this->dbStore($data);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.socialmedia_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.socialmedia_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function googleIndex(Request $request, $type)
    {
        $lang = $request->lang ?? 'ar';
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => route('admin.home')],
            ['name' => __('admin.social_settings'), 'link' => route('admin.social.logins')],
            ['name' => __('admin.sm_'.$type.'_title')]
        ];
        return view('admin.social.google.'.$type, ['breadcrumbs' => $breadcrumbs,'lang' => $lang, 'page' => $type]);
    }

    public function dbStore($data)
    {
        foreach ($data as $key => $value) {
            if($value != null)
            {
                GeneralSetting::updateOrCreate(
                    ['name' => $key, 'locale' => null],
                    ['value' => $value]
                );
            }
        }
    }

    public function googleStore(Request $request)
    {
        $data = $request->only('google_analytics','google_recaptcha');

        if($request->google_analytics)
        {
            $data['google_analytics'] = json_encode($data['google_analytics']);
        }
        if($request->google_recaptcha)
        {
            $data['google_recaptcha'] = json_encode($data['google_recaptcha']);
        }
        
        $this->dbStore($data);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.socialmedia_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.socialmedia_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }
}

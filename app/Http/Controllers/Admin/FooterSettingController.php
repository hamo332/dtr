<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Responses\Common\CommonResponse;

class FooterSettingController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->lang ?? 'ar';
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.appearance_settings'), 'link' => 'design'],
            ['name' => __('admin.fs_title')]
        ];
        return view('admin.design.footer.index',['breadcrumbs' => $breadcrumbs,'lang' => $lang]);
    }

    public function aboutSettings(Request $request)
    {
        $data = $request->validate([
            'footer_logo' => 'required|numeric',
            'footer_about' => 'required',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);

        $data = $request->only('footer_logo','footer_about','play_app','apple_app');
        
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.footer_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.footer_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function contactData(Request $request)
    {

        $data = $request->validate([
            'contact_phone' => 'required|numeric|min:8',
            'contact_address' => 'required|string',
            'contact_mail' => 'required|email',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);

        $data = $request->only('contact_phone','contact_address','contact_mail','contact_location', 'working_hours');
        
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.footer_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.footer_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function additionalLinksSettings(Request $request)
    {
        $data = $request->validate([
            'additional_links' => 'required|array',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);

        $data = $request->only('additional_links');
        $data['additional_links'] = json_encode($data['additional_links']);
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.footer_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.footer_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function socialmediaSettings(Request $request)
    {
        $data = $request->validate([
            'socialmedia' => 'required|array',
        ]);

        $data = $request->only('socialmedia');
        $data['socialmedia'] = json_encode($data['socialmedia']);
        $this->store($data,$request);
        
        Cache::flush();
        
        $request->session()->flash('success', __('notifications.footer_settings_updated'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.footer_settings_updated'),
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

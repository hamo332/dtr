<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckMailer;
use App\Http\Controllers\Responses\Common\CommonResponse;


class MailSettingController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => route('admin.home')],
            ['name' => __('admin.system_settings'), 'link' => route('admin.general_settings')],
            ['name' => __('admin.ms_title')]
        ];
        return view('admin.settings.mail',['breadcrumbs' => $breadcrumbs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mail_server' => 'required|min:6',
            'mail_port' => 'required|digits:3',
            'mail_user' => 'required|email',
            'mail_password' => 'required',
            'mail_encryption' => ['required',Rule::in(['ssl', 'tls','SSL','TLS'])],
            'mail_sender' => 'required|email',
            'mail_sender_name' => 'required',
        ]);

        $data = $request->only('mail_server','mail_port','mail_user','mail_password','mail_encryption','mail_sender','mail_sender_name');

        foreach ($data as $key => $value) {
            GeneralSetting::updateOrCreate(
                ['name' => $key],
                ['value' => $value]
            );
        }

        Cache::flush();

        // set config variables 
        $this->setConfig($request);

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.mail_settings_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function setConfig($request)
    {
        return setEnv([
            'MAIL_MAILER' => 'smtp',
            'MAIL_HOST' => $request->mail_server,
            'MAIL_PORT' => $request->mail_port,
            'MAIL_ENCRYPTION' => $request->mail_encryption,
            'MAIL_USERNAME' => $request->mail_user,
            'MAIL_PASSWORD' => $request->mail_password,
            'MAIL_FROM_ADDRESS' => $request->mail_sender,
            'MAIL_FROM_NAME' => $request->mail_sender_name,
        ]);
    }

    public function checkMail(Request $request)
    {
        $request->validate(['mail' => 'required|email']);

        Mail::to($request->mail)->send(new CheckMailer());

        $request->session()->flash('success', __('notifications.mail_sent'));

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.mail_sent'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Responses\Common\CommonResponse;

class ProfileController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $user = Auth::user();
        $activities = Activity::where('causer_id',$user->id)->orderBy('created_at', 'desc')->get();
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => 'admin.home'], 
            ['name' => __('admin.profile')],
        ];
        return view('admin.profile.index',compact('breadcrumbs', 'user', 'roles', 'activities'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string:6',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'user_img' => 'required|numeric',
        ]);

        // add to activities table
        activityLogger('logs.updated_profile');

        // update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_img = $request->user_img;
        $user->save();

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.user_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function securityUpdate(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        // add to activities table
        activityLogger('logs.updated_profile_password');

        // update user data
        $user->password = bcrypt($request->password);
        $user->save();

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.user_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('admin.auth.forgot_password');
    }

    public function sendLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        // log the link request 
        activityLogger('logs.reset_password_request');

        return $status === Password::RESET_LINK_SENT
                    ? back()->withSuccess(['success' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword()
    {
        return view('admin.auth.reset_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('success', __('notifications.password_changes'))
                    : back()->withErrors(['error' => [__($status)]]);
    } 
}

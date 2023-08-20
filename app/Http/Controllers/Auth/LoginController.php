<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Responses\Authentication\authenticateResponse;

class LoginController extends Controller
{
    //

    public function adminIndex()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        // validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        $remember = $request->remember == 'on' ? true : false;

        $status = 'failed';
        $redirectUrl = null;
        $message = __('auth.failed');
        
        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();
            $request->session()->flash('success', __('auth.success'));
            // log the login 
            activityLogger('logs.logged_in');

            $status = 'success';
            $redirectUrl = route('admin.home');
            $message = __('auth.success');
            
        }

        // log the failed login 
        activityLogger('logs.login_failed',['mail' => $request->email, 'password' => $request->password]);
        
        $payload = [
            'type' => request('action'),
            'status' => $status,
            'redirect_url' => $redirectUrl,
            'message' => $message,
        ];
        //show the response
        return new AuthenticateResponse($payload);
    }

    public function logout(Request $request)
    {
        // log the logout 
        activityLogger('logs.logged_out');

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

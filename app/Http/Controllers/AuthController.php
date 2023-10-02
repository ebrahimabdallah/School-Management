<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function Login()
    {
        if (!empty(Auth::check())) {
            return redirect('admin/dashboard');
        }

        return view('auth.login');
    }
    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        //check password and email is corrected
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } elseif (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } elseif (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'Please Enter Correct Password and Email');
        }
    }
    public function AuthForgetPassword()
    {
        return view('auth.forgetPassword');
    }
    public function postForgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your email to reset your password');
        } else {
            return redirect()->back()->with('error', 'Email not found in the system');
        }
    }
    public function AuthLogOut()
    {
        Auth::logout();
        return redirect(url(''));
    }
}

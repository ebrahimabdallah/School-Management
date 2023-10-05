<?php

namespace App\Http\Controllers;

use App\Models\User;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ChangePassword()
    {
        $data['header_title']='Password';

        return view('profile/change-password',$data);
    }
    
    public function UpdatePassword(Request $request)
    {
     $user=User::getSingle(Auth::user()->id);
     if(Hash::check($request->oldPassword,$user->password))
     {
      $user->password=Hash::make($request->newPassword);
      $user->save();
      return redirect()->back()->with('success',"Successfully Change Password");
     
    }
     else
     {
        return redirect()->back()->with('error',"Old Password Inavaild");
     
    }
     }
}

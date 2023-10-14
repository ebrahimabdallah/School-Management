<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateteacherRequest;
use App\Models\ClassModel;
use App\Models\User;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function ChangePassword()
    {
        $data['header_title']='Change Password';
        return view('profile/change-password',$data);
    }
    public function Account()
    {
        $data['getRecord']=User::getSingle(Auth::user()->id);
        $data['getClass'] = ClassModel::getClass();
        $data['header_title']='My Account';
        if(Auth::user()->user_type==2)
        {
        return view('teacher/account',$data);
       }
      else if(Auth::user()->user_type == 3)
       {
        return view('student/account',$data);
    
       }
    }
 
    
      
    public function editAccount(UpdateteacherRequest $request)
    {
        $id=Auth::user()->id;
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->email = trim($request->email);
        $teacher->mobile_number = $request->mobile_number;
        $teacher->address = $request->address;
      
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = $request->date_of_birth;
        }

        $teacher->Qualification = $request->Qualification;
        $teacher->experience = $request->experience;
        $teacher->martial_status = $request->martial_status;

     
        // Image update
        if ($request->hasFile('profile_picture')) {
            if (!empty($teacher->profile_picture)) {
                File::delete('upload/profile/' . $teacher->profile_picture);
            }
            $image = $request->file('profile_picture');
            $extension = strtolower($image->getClientOriginalExtension());
            $randomString = Str::random(20);
            $filename = $randomString . '.' . $extension;
            $image->move('upload/profile/', $filename);
            $teacher->profile_picture = $filename;
        }
            
            $teacher->save();
            return redirect('teacher/dashboard')->with('success', 'Updated Account info successfully.');

        }
  
      public function EditStudentAccount(Request $request)
{ 
    $id=Auth::user()->id;
    $student = User::getSingle($id);
    $student->name = trim($request->name);
    $student->last_name = trim($request->last_name);
    $student->caste = trim($request->caste);
    $student->email = trim($request->email);
     $student->mobile_number = $request->mobile_number;
    $student->gender = $request->gender;
     $student->religion = $request->religion;
 
    if (!empty($request->date_of_birth)) {
        $student->date_of_birth = $request->date_of_birth;
    }

    $student->blood_group = $request->blood_group;
    $student->height = $request->height;
    $student->weight = $request->weight;

   

    // Image update
    if ($request->hasFile('profile_picture')) {
        if (!empty($student->profile_picture)) {
            File::delete('upload/profile/' . $student->profile_picture);
        }
        $image = $request->file('profile_picture');
        $extension = strtolower($image->getClientOriginalExtension());
        $randomString = Str::random(20);
        $filename = $randomString . '.' . $extension;
        $image->move('upload/profile/', $filename);
        $student->profile_picture = $filename;
    }
        $student->save();
         return redirect('student/account')->with('success', 'Successfully Change Account info.');

    
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
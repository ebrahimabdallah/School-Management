<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacherRequest;
use App\Http\Requests\UpdateteacherRequest;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function List()
    {
        $data['getRecord']=User::getTeacher();
        $data['header_title']="List Teacher";
        return view('admin.teacher.list',$data);

    }
    public function Add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add teacher';
        return view('admin/teacher/add', $data);
    }

    public function Insert(teacherRequest $request)
    {


        $teacher = new User();
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);

        $teacher->password = Hash::make($request->password);
        $teacher->email = trim($request->email);
        $teacher->admission_number = $request->admission_number;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->address = $request->address;

        $teacher->Qualification = $request->Qualification;
        $teacher->experience = $request->experience;
        $teacher->martial_status = $request->martial_status;

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = $request->date_of_birth;
        }



        if (!empty($request->admission_date)) {
            $teacher->admission_date = $request->admission_date;
        }

        // Image save
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $extension = strtolower($image->getClientOriginalExtension());
            $randomString = Str::random(20);
            $filename = $randomString . '.' . $extension;
            $image->move('upload/profile/', $filename);
            $teacher->profile_picture = $filename;
        }

        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Successfully added a new teacher.');
    }

    public function Edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if (!empty($data['getRecord'])) {

            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = 'teacher Edit';
            return view('admin/teacher/edit', $data);
        } else {
            abort(404);

        }
    }
     public function update($id, UpdateteacherRequest $request)
    {
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
         $teacher->email = trim($request->email);
        $teacher->admission_number = $request->admission_number;
        $teacher->mobile_number = $request->mobile_number;
        $teacher->address = $request->address;

        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = $request->date_of_birth;
        }

        $teacher->Qualification = $request->Qualification;
        $teacher->experience = $request->experience;
        $teacher->martial_status = $request->martial_status;

        if (!empty($request->admission_date)) {
            $teacher->admission_date = $request->admission_date;
        }

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

        if (!empty($request->password)) {
            $teacher->password = Hash::make($request->password);
        }

        $teacher->save();

        return redirect('admin/teacher/list')->with('success', 'Updated a teacher successfully.');
}


    public function Delete($id)
    {
        $teacher=User::getSingle($id);
        $teacher->is_delete=1;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success', 'Successfully Deleted a teacher.');

    }
}


<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\File;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function List()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin/student/list', $data);
    }

    public function Add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add Student';
        return view('admin/student/add', $data);
    }

    public function Insert(StudentRequest $request)
    {

        
        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->caste = trim($request->caste);

        $student->password = Hash::make($request->password);
        $student->email = trim($request->email);
        $student->admission_number = $request->admission_number;
        $student->mobile_number = $request->mobile_number;
        $student->gender = $request->gender;
        $student->class_id = $request->class_id;
        $student->religion = $request->religion;

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = $request->date_of_birth;
        }

        $student->blood_group = $request->blood_group;
        $student->height = $request->height;
        $student->weight = $request->weight;

        if (!empty($request->admission_date)) {
            $student->admission_date = $request->admission_date;
        }

        // Image save
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $extension = strtolower($image->getClientOriginalExtension());
            $randomString = Str::random(20);
            $filename = $randomString . '.' . $extension;
            $image->move('upload/profile/', $filename);
            $student->profile_picture = $filename;
        }

        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', 'Successfully added a new student.');
    }

    public function Edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        
        if (!empty($data['getRecord'])) {

            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = 'Student Edit';
            return view('admin/student/edit', $data);
        } else {
            abort(404);

        }
    }
     public function update($id, UpdateStudentRequest $request)
    {
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->caste = trim($request->caste);
        $student->email = trim($request->email);
        $student->admission_number = $request->admission_number;
        $student->mobile_number = $request->mobile_number;
        $student->gender = $request->gender;
        $student->class_id = $request->class_id;
        $student->religion = $request->religion;

        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = $request->date_of_birth;
        }

        $student->blood_group = $request->blood_group;
        $student->height = $request->height;
        $student->weight = $request->weight;

        if (!empty($request->admission_date)) {
            $student->admission_date = $request->admission_date;
        }

        // Image save
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

        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }

        $student->save();

        return redirect('admin/student/list')->with('success', 'Updated a student successfully.');
}
 

    public function Delete($id)
    {
        $student=User::getSingle($id);
        $student->is_delete=1;
        $student->save();
        return redirect('admin/student/list')->with('success', 'Successfully Deleted a Student.');
        
    }
}
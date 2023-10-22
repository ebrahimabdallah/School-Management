<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherClassController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = TeacherClass::getRecord();
        $data['header_title'] = "Teacher Class";
        return view('admin.assign_teacher_class.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Teacher Class";
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getClassTeacher();

        return view('admin.assign_teacher_class.add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = TeacherClass::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new TeacherClass();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;

                    $save->save();
                }
            }
            return redirect('admin/assign_teacher_class/list')->with('success', 'Successfully');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Try Again Exist Some Error');
        }
    }

    public function edit($id)
    {
        $getRecord = TeacherClass::singleClassTeacher($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['header_title'] = "Edit";

            $data['AssignTeacherID'] = TeacherClass::AssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getClassTeacher();

            return view('admin.assign_teacher_class.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update($id,Request $request)
    {
        TeacherClass::deleteTeacher($request->class_id);
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = TeacherClass::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new TeacherClass();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                     $save->save();
                }
            }
        }
        return redirect('admin/assign_teacher_class/list')->with('success', 'Successfully');
    }
    public function delete($id)
    {
        $save = TeacherClass::singleClassTeacher($id);
        $save->is_delete = 1;
        $save->save();
        return redirect('admin/assign_teacher_class/list')->with('success', 'Delete Successfully');
    }

//Class Related Teacher
    public function myClassTeacher()
{
    $data['getRecord'] = TeacherClass::getTeacherClass(Auth::user()->id);
    $data['header_title'] = "Teachers Subjects";
    return view('teacher/myClass', $data);

}
//Students Related Teacher
public function MyStudent()
{
    $data['getRecord'] = User::getTeacherStudents(Auth::user()->id);
    $data['header_title'] = "Student";
    return view('teacher/myStudents', $data);
}
}

<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\classSubjectModel;
use App\Models\Subject;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function List(Request $request)
    {
        $data['getRecord'] = classSubjectModel::getRecord();
        $data['header_title'] = 'Subject Assign List';
        return view('admin/assign_subject/list', $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = Subject::getSubject();
        $data['header_title'] = 'New Subject Assign';
        return view('admin/assign_subject/add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = classSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new classSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('assign/list')->with('success', 'Successfully');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Try Again Exist Some Error');
        }
    }

    public function edit($id)
    {
        $getRecord = classSubjectModel::getClassSubject($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = classSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = Subject::getSubject();
            $data['header_title'] = 'Edit Assign Subject';

            return view('admin/assign_subject/edit', $data);
        } else {
            abort(404);
        }
    }

    public function singleEdit($id)
    {
        $getRecord = classSubjectModel::singleClassTeacher($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = Subject::getSubject();
        $data['header_title'] = 'Edit Assign Subject';
            return view('admin/assign_subject/single-edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        classSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = classSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new classSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('assign/list')->with('success', 'Successfully');
    }

    public function deleteSubClass($id)
    {
        $save = classSubjectModel::getClassSubject($id);
        $save->is_delete = 1;
        $save->save();
        return redirect('assign/list')->with('success', 'Delete Successfully');
    }

    public function singleUpdate($id, Request $request)
    {
        $getAlreadyFirst = classSubjectModel::getAlreadyFirst( $request->class_id,$request->subject_id);
        
        if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('assign/list')->with('success', 'Status Successfully Updated');
        } else {
            $save = classSubjectModel::getClassSubject($id);
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->status = $request->status;
            $save->save();
        
        return redirect('assign/list')->with('success', 'Subject Successfully');
    }
}
}
<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\Week;
use Illuminate\Http\Request;

class ClassTimeController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if (!empty($request->class_id)) {
            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id);
        }
        else
        {
            $data['getSubject'] = [];
        }

        //to get days as week ans show
$weekModel=new Week();
$data['Week']=$weekModel->getRecord()->map(function ($value)
    {
        return [
            'Week_id'=>$value->id,
            'Week_name'=>$value->name,
        ];
    })->toArray();
//end week days


        $data['header_title'] = 'ClassTime';
        return view('admin.ClassTime.list', $data);
    }

    public function get_subject(Request $request)
    {
        $getSubject = ClassSubjectModel::mySubject($request->class_id);
        $html = "<option value=''>Select Class</option>";

        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>" . $value->subject_name . "</option>";
        }

        $json['html'] = $html;
        return response()->json($json);
    }
}

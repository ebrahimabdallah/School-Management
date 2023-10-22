<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ClassSubjectTime;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassTimeController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = [];

        if (!empty($request->class_id)) {
            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id);
        }

        // Get week and show
        $weekModel = new Week();
        $getWeek = $weekModel->getRecord();
        $week = [];

        foreach ($getWeek as $value) {
            $dataWeek = [
                'Week_id' => $value->id,
                'Week_name' => $value->name,
                'start_time' => '',
                'end_time' => '',
                'room_number' => ''
            ];

            if (!empty($request->class_id) && !empty($request->subject_id)) {
                $ClassSubjects = ClassSubjectTime::getRecordClassSubject($request->class_id, $request->subject_id, $value->id);

                if (!empty($ClassSubjects)) {
                    $dataWeek['start_time'] = $ClassSubjects->start_time;
                    $dataWeek['end_time'] = $ClassSubjects->end_time;
                    $dataWeek['room_number'] = $ClassSubjects->room_number;
                }
            }

            $week[] = $dataWeek;
        }

        $data['Week'] = $week;
        $data['header_title'] = 'ClassTime';
        return view('admin.ClassTime.list', $data);
    }

    public function get_subject(Request $request)
    {
        $getSubject = ClassSubjectModel::mySubject($request->class_id);
        $html = "<option value=''>Select Class</option>";

        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>" . $value->subject_name . '</option>';
        }

        $json['html'] = $html;
        return response()->json($json);
    }

    public function insert(Request $request)
    {
        // Remove old time table entries for the same subject and class
        ClassSubjectTime::where('class_id', $request->class_id)
            ->where('subject_id', $request->subject_id)
            ->delete();

        foreach ($request->timetable as $timetable) {
            if (!empty($timetable['Week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])) {
                $time = new ClassSubjectTime();
                $time->class_id = $request->class_id;
                $time->subject_id = $request->subject_id;
                $time->room_number = $timetable['room_number'];
                $time->start_time = $timetable['start_time'];
                $time->Week_id = $timetable['Week_id'];
                $time->end_time = $timetable['end_time'];
                $time->save();
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Class TimeTable saved successfully');
    }

    public function MyClassTime(Request $request)
    {
        $result = [];
        $getRecord = ClassSubjectModel::mySubject(Auth::user()->class_id);

        foreach ($getRecord as $value) {
            $dataSubject['name'] = $value->subject_name;

            $get = new Week();
            $getWeek = $get->getRecord();
            $week = [];

            foreach ($getWeek as $valueWeek) {
                $dataWeek = [
                    'Week_name' => $valueWeek->name,
                    'start_time' => '',
                    'end_time' => '',
                    'room_number' => ''
                ];

                $ClassSubjects = ClassSubjectTime::getRecordClassSubject($value->class_id, $value->subject_id, $valueWeek->id);

                if (!empty($ClassSubjects)) {
                    $dataWeek['start_time'] = $ClassSubjects->start_time;
                    $dataWeek['end_time'] = $ClassSubjects->end_time;
                    $dataWeek['room_number'] = $ClassSubjects->room_number;
                }

                $week[] = $dataWeek;
            }

            $dataSubject['week'] = $week;
            $result[] = $dataSubject;
        }

        $data['getRecord']=$result;
        $data['header_title'] = 'MyTimeTable';
        return view('student.MyClassTime', $data);
    }
}

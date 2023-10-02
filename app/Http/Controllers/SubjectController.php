<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function List(){

        $data['getRecord']=Subject::getRecord();
         $data['header_title'] = 'Subject List';
        return view('admin/subject/list', $data);
    }

    public function addsubject()
    {
        return view('admin/subject/add');
    }
    public function insertSubject(Request $request)
    {
        $subject = new Subject();
        $subject->name = trim($request->name);
        $subject->status=$request->status;
        $subject->created_by=Auth::user()->id;
        $subject->type=$request->type;
        $subject->save();
        return redirect('subject/list')->with('success', 'Add a New subject Successfully');
 
    }
public function editsubject($id)
{

    $data['getRecord']=Subject::getSubjectUpdate($id);
    if(!empty($data['getRecord']))
    {
    $data['header_title'] = 'Subject List';
   return view('admin/subject/edit', $data);
}
else
{abort(404);}
}
public function updatesubject($id,Request $request)
    {
        $subject = Subject::getSubjectUpdate($id);
        $subject->name = $request->name;
        $subject->status=$request->status;
        $subject->type=$request->type;

         $subject->save();
        return redirect('subject/list')->with('success', 'update a New subject Successfully');
 
    }
public function deletesubject($id)
{
  $subject=Subject::getSubjectUpdate($id);
  $subject->is_delete=1;
  $subject->save();
  return  redirect('subject/list')->with('success', 'Delete a subject Successfully');
} 

}

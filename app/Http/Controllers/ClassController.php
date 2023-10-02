<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ClassController extends Controller
{
    public function List(){

        $data['getRecord']=ClassModel::getRecord();
         $data['header_title'] = 'Class List';
        return view('admin/class/list', $data);
    }

    public function addClass()
    {
        return view('admin/class/add');
    }
    public function classInsert(Request $request)
    {
        $class = new ClassModel();
        $class->name = trim($request->name);
        $class->status=$request->status;
        $class->created_by=Auth::user()->id;
        $class->save();
        return redirect('Class/list')->with('success', 'Add a New Class Successfully');
 
    }
public function editClass($id)
{

    $data['getRecord']=ClassModel::getClassupdate($id);
    if(!empty($data['getRecord']))
    {
    $data['header_title'] = 'Edit List';
   return view('admin/class/edit', $data);
}
else
{abort(404);}
}
public function updateClass($id,Request $request)
    {
        $class = ClassModel::getClassupdate($id);
        $class->name = $request->name;
        $class->status=$request->status;
         $class->save();
        return redirect('Class/list')->with('success', 'update a New Class Successfully');
 
    }
public function deleteClass($id)
{
  $class=ClassModel::getClassupdate($id);
  $class->is_delete=1;
  $class->save();
  return  redirect('Class/list')->with('success', 'Delete a New Class Successfully');
} 

}


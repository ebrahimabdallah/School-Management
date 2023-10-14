<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParentController extends Controller
{

    public function list()
    {
    $data['getRecord']=User::getPerant();
    $data['header_title']="Parent";
    return view('admin.parent.list',$data);
    }
    public function Add()
    {
        
        $data['header_title'] = 'Add parent';
        return view('admin/parent/add', $data);
    }

    public function Insert(Request $request)
    {

        
        $parent = new User();
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->caste = trim($request->caste);
   // Image save
   if ($request->hasFile('profile_picture')) {
    $image = $request->file('profile_picture');
    $extension = strtolower($image->getClientOriginalExtension());
    $randomString = Str::random(20);
    $filename = $randomString . '.' . $extension;
    $image->move('upload/profile/', $filename);
    $parent->profile_picture = $filename;
}

        $parent->password = Hash::make($request->password);
        $parent->email = trim($request->email);
        $parent->address = trim($request->address);
        $parent->job = trim($request->job);

        $parent->admission_number = $request->admission_number;
        $parent->mobile_number = $request->mobile_number;
        $parent->gender = $request->gender;
        $parent->class_id = $request->class_id;
        $parent->religion = $request->religion;

        if (!empty($request->date_of_birth)) {
            $parent->date_of_birth = $request->date_of_birth;
        }
 

        if (!empty($request->admission_date)) {
            $parent->admission_date = $request->admission_date;
        }

         

        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/parent/list')->with('success', 'Successfully added a new parent.');
    }

    public function Edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        
        if (!empty($data['getRecord'])) {

             $data['header_title'] = 'parent Edit';
            return view('admin/parent/edit', $data);
        } else {
            abort(404);

        }
    }
     public function update($id, Request $request)
    {
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->caste = trim($request->caste);
        $parent->email = trim($request->email);
        $parent->job = trim($request->job);
        $parent->address = trim($request->address);
        //image update
        if ($request->hasFile('profile_picture')) {
            if (!empty($parent->profile_picture)) {
                File::delete('upload/profile/' . $parent->profile_picture);
            }
            $image = $request->file('profile_picture');
            $extension = strtolower($image->getClientOriginalExtension());
            $randomString = Str::random(20);
            $filename = $randomString . '.' . $extension;
            $image->move('upload/profile/', $filename);
            $parent->profile_picture = $filename;
        }
        $parent->admission_number = $request->admission_number;
        $parent->mobile_number = $request->mobile_number;
        $parent->gender = $request->gender;
        $parent->class_id = $request->class_id;
        $parent->religion = $request->religion;
        $parent->roll_number = $request->roll_number;

        if (!empty($request->date_of_birth)) {
            $parent->date_of_birth = $request->date_of_birth;
        }

        $parent->blood_group = $request->blood_group;
        $parent->height = $request->height;
        $parent->weight = $request->weight;

        if (!empty($request->admission_date)) {
            $parent->admission_date = $request->admission_date;
        }

        
        if (!empty($request->password)) {
            $parent->password = Hash::make($request->password);
        }

        $parent->save();

        return redirect('admin/parent/list')->with('success', 'Updated a parent successfully.');
}
 

    public function Delete($id)
    {
        $parent=User::getSingle($id);
        $parent->is_delete=1;
        $parent->save();
        return redirect('admin/parent/list')->with('success', 'Successfully Deleted a parent.');
        
    }
    public function MyStudent($id)
    {
        $data['getParent']=User::getSingle($id);
        $data['parent_id']=$id; 
        $data['getSearchStudent']=User::getSearchStudent();
        $data['getRecord']=User::getMyStudent($id);

        $data['header_title']="Parent Student";
        return view('admin/parent/mystudent',$data);
    }

    public function AssignStudentParent($student_id,$parent_id)
    {
         
         $student=User::getSingle($student_id);
         $student->parent_id=$parent_id;
         $student->save();
         return redirect()->back()->with('success','Student Assign Parent Successfully'); 
      }

      public function assignMyStudentDelete ($student_id)
      {
           
           $student=User::getSingle($student_id);
           $student->parent_id=null;
           $student->save();
           return redirect()->back()->with('success','Student Assign Parent Deleted'); 
        }
}


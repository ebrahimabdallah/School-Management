<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function List()
    {
        
        $data['getRecord'] = User::getAdmin(); //Scope to get Admin only from table [in model User]
        $data['header_title'] = 'Admin List';
        return view('admin/admin/list', $data);
    }

    public function adminAdd()
    {
        $data['header_title'] = 'Add Page Admin';
        return view('admin/admin/admin-Add', $data);
    }

    public function adminInsert(Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users' 
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->password = Hash::make($request->password);
        $user->email = trim($request->email);
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Add a New Admin Successfully');
    }
    public function adminEdit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'Admin Edit';
            return view('admin/admin/admin-Edit', $data);
        } else {
            abort(404);

        }
    }
    public function UpdateAdmin($id, Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users,email,'.$id 
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) 
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Update a New Admin Successfully');
    }
   public function deleteAdmin ($id)
   {
    $user = User::getSingle($id);
    $user->is_delete=1;
    $user->save();
    return redirect('admin/admin/list')->with('success', 'delete a New Admin Successfully');

   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassTimeController extends Controller
{
    public function list()
    {
        $data['header_title'] = "ClassTime";
        return view('admin/ClassTime/list',$data);
    }
}

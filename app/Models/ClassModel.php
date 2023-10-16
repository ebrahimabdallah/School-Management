<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
class ClassModel extends Model
{
    use HasFactory;

    protected $table='class';

    protected $fillable=[
        'name','status','created_by','created_at'
    ];

     static public function getRecord()
     {
     $return =ClassModel::select('class.*','users.name as created_by_name')
     //inner join 
     ->join('users','users.id','class.created_by');
     if(!empty(Request::get('name')))
     {
       $return=$return->where('class.name','like','%'.Request::get('name').'%');
     }
     
     
     $return=$return->where('class.is_delete','=','0')->
          orderBy('class.id','desc')->paginate(5);
    
     return $return;
    }

    static public function getClassupdate($id)
    {
        return self::find($id);
    }
    static public function getClass()
    {
        $return =ClassModel::select('class.*' )
        //inner join 
        ->join('users','users.id','class.created_by')    
        ->where('class.is_delete','=','0')
        ->where('class.status','=','0')->
        orderBy('class.name','asc')->get();
       
        return $return;
    }

}

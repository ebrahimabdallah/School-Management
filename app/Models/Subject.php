<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Subject extends Model
{
    use HasFactory;
    protected $table='Subject';

    protected $fillable=[
        'name','type','status'
    ];


    static public function getRecord()
    {
        $return =Subject::select('subject.*','users.name as created_by_name')
        ->join('users','users.id','subject.created_by');
        if(!empty(Request::get('name')))
        {
          $return=$return->where('subject.name','like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('type')))
        {
          $return=$return->where('subject.type','like','%'.Request::get('type').'%');
        }
        if(!empty(Request::get('status')))
        {
            $return=$return->where('subject.status','like','%'.Request::get('status').'%');
        }
        
        $return=$return->where('subject.is_delete','=','0')->
             orderBy('subject.id','desc')->paginate(5);
       
        return $return; 
       }
    
   static function getSubjectUpdate($id)
   {
       return self::find($id);
   }

static function getSubject()
{
    $return =Subject::select('subject.*')
     ->join('users','users.id','subject.created_by')
     ->where('subject.is_delete','=','0')
     ->where('subject.status','=','0')
     ->orderBy('subject.name','asc')->get();
     return $return; 
}
}

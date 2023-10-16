<?php

namespace App\Models;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classSubjectModel extends Model
{
    use HasFactory;

    protected $table='subject_class';

    static public function getRecord()
    {
         $return= self::select( 'subject_class.*','class.name as class_name','subject.name as subject_name','users.name as 
         created_by_name')->
         join('subject','subject.id','=','subject_class.subject_id')
         ->join('class','class.id','=','subject_class.class_id')  
         ->join('users','users.id','=','subject_class.created_by');

         if(!empty(Request::get('class_name')))
         {
           $return=$return->where('class.name','like','%'.Request::get('class_name').'%');
         }
         if(!empty(Request::get('subject_name')))
         {
           $return=$return->where('subject.name','like','%'.Request::get('subject_name').'%');
         }
         
         $return=$return->where('subject_class.is_delete','=','0')->
         orderBy('subject_class.id','desc')->paginate(20); 
          return  $return;
      }
  static public function getAlreadyFirst($class_id,$subject_id)
  {
     return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
  }

  static public function getClassSubject($id)
  {
     return self::find($id);
  }
  static public function getAssignSubjectID($class_id)
  { 
    return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();

  }
  static public function deleteSubject($class_id)
  { 
    return self::where('class_id','=',$class_id)->delete();
  }
  
  static public function mySubject($class_id)
    {
        return $return= self::select( 'subject_class.*','class.name as class_name', 'subject_class.subject_id',
         'subject.name as subject_name','subject.type as subject_type',)
         ->join('subject','subject.id','=','subject_class.subject_id')
         ->join('class','class.id','=','subject_class.class_id')  
         ->join('users','users.id','=','subject_class.created_by')  

          ->where('subject_class.class_id','=',$class_id)
          ->where('subject_class.is_delete','=',0)
          ->where('subject_class.status','=',0)->
           orderBy('subject_class.id','desc')->get(); 
    }

       }



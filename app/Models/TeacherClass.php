<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;
    protected $table='class_teacher';



static public function getRecord()
{
    $return=self::select('class_teacher.*','class.name as class_name' ,'teacher.name as teacher_name')
    ->join('class','class.id' ,'=','class_teacher.class_id')
    ->join('users as teacher','teacher.id' ,'=','class_teacher.teacher_id')

      ->where('class_teacher.is_delete','=',0);
    $return=$return->orderBy('id', 'desc')
    ->get();
        return $return;
}

static public function getAlreadyFirst($class_id,$teacher_id)
{
    return self::where('class_id','=',$class_id)->where('teacher_id','=',$teacher_id)->first();
}
static public function AssignTeacherID($teacher_id)
{
    return self::where('teacher_id','=',$teacher_id)->where('is_delete','=',0)->get();
}

 static public function singleClassTeacher ($id)
{
    return self::find($id);
}

static public function deleteTeacher($class_id)
{ 
  return self::where('class_id','=',$class_id)->delete();

}
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectTime extends Model
{
    protected $table = 'class_subject_time';
    use HasFactory;
    static function getRecordClassSubject($class_id, $subject_id, $Week_id)
    {
        return self::where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->where('Week_id', '=', $Week_id)
            ->first();
    }
}

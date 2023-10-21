<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $table="week";
    use HasFactory;

    public function getRecord()
    {
        return Week::get();
    }

}

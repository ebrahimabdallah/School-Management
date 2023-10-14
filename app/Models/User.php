<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static function getEmailSingle($email)
    {
        return User::where('email','=',$email)->first();
    } 
    
    static function getPerant()
    {
      $return=  self::select('users.*' )
       ->where('users.user_type', '=', 4)
      ->where('users.is_delete', '=', 0);
    if(!empty(Request::get('name')))
    {
      $return=$return->where('name','like','%'.Request::get('name').'%'); 
    }
      $return=$return->orderBy('id', 'desc')
      ->paginate(10);
      return $return;
    }

    static function getTeacher()
    {
      $return=  self::select('users.*' )
      ->where('users.user_type', '=', 2)
     ->where('users.is_delete', '=', 0);
     if(!empty(Request::get('name')))
     {
        $return=$return->where('name','like','%'.Request::get('name').'%');
     }

     if(!empty(Request::get('martial_status')))
     {
        $return=$return->where('martial_status','like','%'.Request::get('martial_status').'%');
     }

     if(!empty(Request::get('Qualification')))
     {
        $return=$return->where('Qualification','=',Request::get('Qualification'));
     }

     $return=$return->orderBy('id', 'desc')
     ->paginate(10);
     
     return $return;
    }



   static public function getMyStudent($parent_id)
   {
    $return =self::select('users.*','class.name as class_name','parent.name as parent_name')
    ->join('users as parent' ,'parent.id','=','users.parent_id','left')
    ->join('class','class.id','=','users.class_id','left')
    ->where('users.is_delete','=',0)
    ->where('users.user_type','=',3)
    ->where('users.parent_id','=',$parent_id)
    ->orderBy('users.id','desc')->get();
    return $return ;

   }

    static function getStudent()
    {
        $return=  self::select('users.*', 'class.name as class_name','parent.name as parent_name','parent.last_name as parent_last_name')
        ->join('users as parent' ,'parent.id','=','users.parent_id','left')
        ->leftJoin('class', 'class.id', '=', 'users.class_id')
        ->where('users.user_type', '=', 3)
        ->where('users.is_delete', '=', 0);
      
      
        if(!empty(Request::get('name')))
      {
        $return=$return->where('name','like','%'.Request::get('name').'%');
      }

      if(!empty(Request::get('blood_group')))
      {
        $return=$return->where('blood_group','like','%'.Request::get('blood_group').'%');

      }
      if(!empty(Request::get('class')))
      {
        $return=$return->where('class.name','like','%'.Request::get('class').'%');

      }

        $return=$return->orderBy('users.id', 'desc')
        ->paginate(10);
        return $return;
    } 

    public function getProfile()
    {
       if(!empty($this->profile_picture)&& file_exists('upload/profile/'.$this->profile_picture))
    {
        return url('upload/profile/'.$this->profile_picture);
    }
    else{
        return "";
    }
    } 


static public function getSearchStudent()
{
  if(!empty(Request::get('id'))||!empty(Request::get('last_name'))||!empty(Request::get('email'))||!empty(Request::get('name')))
{
  $return= self::select('users.*','class.name as class_name','parent.name as parent_name')
  ->join('users as parent','parent.id','=','users.parent_id','left')
  ->join('class','class.id','=','users.class_id','left')
  ->where('users.user_type','=',3)
  ->where('users.is_delete','=',0);
 
 
 
  if(!empty(Request::get('id')))
  {
     $return=$return->where('users.id','like','%'.Request::get('id').'%');
  }
  if(!empty(Request::get('name')))
  {
     $return=$return->where('users.name','like','%'.Request::get('name').'%');
  }

  if(!empty(Request::get('email')))
  {
     $return=$return->where('users.email','like','%'.Request::get('email').'%');
  }

  if(!empty(Request::get('last_name')))
  {
     $return=$return->whereDate('users.last_name','=',Request::get('last_name'));
  }

  $return=$return->orderby('users.id','desc')
  ->limit(50)
  ->get();
  return $return;
}
}    


    static function getAdmin()
    {
        $return= self::select('users.*')
        ->where('user_type','=',1)
        ->where('is_delete','=',0);
      //filter search as admin 
        if(!empty(Request::get('name')))
        {
           $return=$return->where('name','like','%'.Request::get('name').'%');
        }

        if(!empty(Request::get('email')))
        {
           $return=$return->where('email','like','%'.Request::get('email').'%');
        }

        if(!empty(Request::get('date')))
        {
           $return=$return->whereDate('created_at','=',Request::get('date'));
        }

        $return=$return->orderby('id','desc')->Paginate(4);
        return $return;
    } 

      //End  filter search as admin 

static function getSingle($id)
    {
        return self::find($id);
    } 
     
}
 
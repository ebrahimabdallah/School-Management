<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request as FacadesRequest;
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

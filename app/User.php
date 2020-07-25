<?php

namespace App;

use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    protected $table = 'users';


    protected $fillable = ['name', 'email', 'password' , 'sekolah' , 'tanggal_lahir' , 'tempatasal'];

    protected $hidden = ['password', 'remember_token'];


    protected $loginPath = '/login';
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';
    protected $redirectAfterRegister = '/';


    public function isAdmin()
    {
      if ($this->role == 2) {
        return true;
      }

      return false;
    }

    public function artikel()
    {
    return $this->hasMany('App\Artikel' , 'id_admin');
    }

    public function comment()
    {
    return $this->hasMany('App\CommentArtikel', 'id_user');
    }

    public function notification()
    {
    return $this->hasMany('App\notification', 'id_user');
    }

    public function videoview()
    {
    return $this->hasMany('App\VideoView', 'id_user');
    }


    public function isOwner()
    {
        if (Auth::guest())
        return false;

        return Auth::user()->id == $this->id;
    }

}

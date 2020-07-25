<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class CommentArtikel extends Model
{
    protected $table = 'artikelcomments';
    protected $fillable = ['comment' , 'id_artikel' , 'id_user'];

    public function user()
    {
    return $this->belongsTo('App\User', 'id_user');
    }

    public function artikel()
    {
    return $this->belongsTo('App\Artikel', 'id_artikel');
    }

    public function isOwner()
    {
        if (Auth::guest())
          return false;

        return Auth::user()->id == $this->user->id;
    }

}

<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    protected $table = 'artikel';
    protected $fillable = ['title' , 'deskripsi' , 'id_kategori' , 'featured_img' ];


    public function kategori()
    {
    return $this->belongsTo('App\Kategoriartikel', 'id_kategori');
    }

    public function user()
    {
    return $this->belongsTo('App\User', 'id_admin');
    }

    public function comment()
    {
    return $this->hasMany('App\CommentArtikel', 'id_artikel');
    }

    public function notification()
    {
    return $this->hasMany('App\notification', 'id_artikel');
    }

    public function isOwner()
    {
        if (Auth::guest())
        return false;

        return Auth::user()->id == $this->user->id;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriartikel extends Model
{
    protected $table = 'kategoriartikel';


    public function artikel()
  {
      return $this->hasMany('App\artikel' ,  'id_kategori', 'id');
  }
}

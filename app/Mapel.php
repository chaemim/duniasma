<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';

    public function video()
  {
      return $this->hasMany('App\Video' ,  'id_mapel');
  }
}

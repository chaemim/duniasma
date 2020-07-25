<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function video()
  {
      return $this->hasMany('App\Video' ,  'id_mapel');
  }
  
}

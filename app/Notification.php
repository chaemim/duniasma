<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

  protected $table = 'notifications';
  protected $guarded = ['id'];

  public function user()
  {
  return $this->belongsTo('App\User', 'id_user');
  }

  public function artikel()
  {
  return $this->belongsTo('App\Artikel', 'id_model');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoView extends Model
{
  protected $table = 'video_view';
  protected $guarded = ['id'];

  public function user()
  {
  return $this->belongsTo('App\User', 'id_user');
  }

  public function video()
  {
  return $this->belongsTo('App\Video', 'id_video');
  }
}

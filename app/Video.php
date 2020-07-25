<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['title' , 'deskripsi' , 'id_kategori' , 'file_video' , 'id_kelas' , 'id_mapel' ];

    public function user()
    {
    return $this->belongsTo('App\User', 'id_admin');
    }

    public function kelas()
    {
    return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function mapel()
    {
    return $this->belongsTo('App\Mapel', 'id_mapel');
    }

    public function videoview()
    {
    return $this->hasMany('App\VideoView', 'id_video');
    }

}

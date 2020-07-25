<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
  public function up()
  {
    Schema::create('videos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->string('deskripsi');
        $table->string('file_video');
        $table->string('id_kategori');
        $table->string('id_admin');
        $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::drop('videos');
  }
}

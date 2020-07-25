<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       // Schema::create('artikel', function (Blueprint $table) {
       //     $table->increments('id');
       //     $table->string('title');
       //     $table->string('deskripsi');
       //     $table->string('featured_img');
       //     $table->integer('id_kategori');
       //     $table->integer('id_admin');
       //     $table->timestamps();
       //    $table->softDeletes();
       //
       //
       // });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         // Schema::drop('artikel');
     }
}

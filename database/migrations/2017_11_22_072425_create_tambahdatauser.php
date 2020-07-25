<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTambahdatauser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->integer('role')->default(1);
        $table->string('password', 60);
        $table->rememberToken();
        $table->timestamps();
          $table->string('tempatasal');
          $table->date('tanggal_lahir');
          $table->string('sekolah');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('users');
    }
}

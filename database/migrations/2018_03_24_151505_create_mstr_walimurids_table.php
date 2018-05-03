<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstrWalimuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstr_walimurids', function (Blueprint $table) {
               // $table->increments('id');
               $table->integer('id')->unique();
               $table->timestamps();
               $table->integer('id_siswa');
               $table->string('nama');
               $table->string('alamat');
               $table->string('path_foto');
               $table->string('hub_keluarga');
               $table->string('pekerjaan');
               $table->string('jenis_kelamin');
               $table->string('email');
               $table->string('no_telp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mstr_walimurids');
    }
}

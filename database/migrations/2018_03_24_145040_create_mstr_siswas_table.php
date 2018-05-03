<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstrSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstr_siswas', function (Blueprint $table) {
           // $table->increments('id');
            $table->integer('id')->unique();
            $table->timestamps();
            $table->integer('id_walimurid');
            $table->string('nama');
            $table->string('alamat');
            $table->string('path_foto');
            $table->string('hobi');
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
        Schema::dropIfExists('mstr_siswas');
    }
}

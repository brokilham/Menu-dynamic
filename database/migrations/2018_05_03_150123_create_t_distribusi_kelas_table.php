<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTDistribusiKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_distribusi_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_siswa');
            $table->integer('id_kelas');
            $table->string('created_by');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_distribusi_kelas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTDistribusiWalikelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_distribusi_walikelas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_guru');
            $table->integer('id_jabatan');
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
        Schema::dropIfExists('t_distribusi_walikelas');
    }
}

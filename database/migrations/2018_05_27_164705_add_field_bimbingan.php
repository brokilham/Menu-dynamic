<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldBimbingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_bimbingans', function (Blueprint $table) {
            $table->string('id_guru');
            $table->string('id_siswa');
            $table->string('id_jadwal');
            $table->dateTime('tgl_pengajuan');
            $table->dateTime('tgl_approval');
            $table->dateTime('tgl_kadaluarsa');
            $table->dateTime('tgl_realisasi');
            $table->string('tipe');
            $table->string('topik_bimbingan');
            $table->string('status_approval');
            $table->string('status_realisasi');
            $table->string('status_kadaluarsa');
            $table->string('status');
            $table->string('created_by');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

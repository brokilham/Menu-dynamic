<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldPelanggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_pelanggarans', function (Blueprint $table) {
            $table->string('jenis_pelanggaran');
            $table->string('jenis_pendisiplinan');
            $table->dateTime('tanggal_kejadian');
            $table->string('lokasi_kejadian');
            $table->string('keterangan');
            $table->string('id_siswa');
            $table->string('created_by');
            $table->string('status');
        }); //
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

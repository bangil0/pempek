<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatDiklatLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_diklat_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pegawai_id');
            $table->smallInteger('status')->default(0);
            $table->string('nama_diklat');
            $table->string('nomor_sertifikat');
            $table->string('tahun');
            $table->integer('jumlah_jam');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_diklat_log', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);
            $table->drop('riwayat_diklat_log');
        });
    }
}

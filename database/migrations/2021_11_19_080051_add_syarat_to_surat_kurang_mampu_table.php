<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSyaratToSuratKurangMampuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_kurang_mampu', function (Blueprint $table) {
            $table->string('nik_ortu')->nullable();
            $table->string('pengantar_path')->nullable();
            $table->string('ktp_saksi1_path')->nullable();
            $table->string('ktp_saksi2_path')->nullable();
            $table->string('pernyataan_saksi_path')->nullable();
            $table->string('rumah_depan_path')->nullable();
            $table->string('rumah_belakang_path')->nullable();
            $table->string('rumah_kanan_path')->nullable();
            $table->string('rumah_kiri_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_kurang_mampu', function (Blueprint $table) {
            $table->string('nik_ortu')->nullable();
            $table->string('pengantar_path')->nullable();
            $table->string('ktp_saksi1_path')->nullable();
            $table->string('ktp_saksi2_path')->nullable();
            $table->string('pernyataan_saksi_path')->nullable();
            $table->string('rumah_depan_path')->nullable();
            $table->string('rumah_belakang_path')->nullable();
            $table->string('rumah_kanan_path')->nullable();
            $table->string('rumah_kiri_path')->nullable();
        });
    }
}

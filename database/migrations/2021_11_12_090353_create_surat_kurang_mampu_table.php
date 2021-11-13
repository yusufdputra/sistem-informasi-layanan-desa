<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKurangMampuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kurang_mampu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengajuan');
            $table->string('nama_ortu');
            $table->string('tempat_lhr_ortu');
            $table->date('tanggal_lhr_ortu');
            $table->string('pekerjaan_ortu');
            $table->text('alamat_ortu');
            $table->text('tujuan');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_kurang_mampu');
    }
}

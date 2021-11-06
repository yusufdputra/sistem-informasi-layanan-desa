<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nama');
            $table->string('tempat_lhr');
            $table->date('tanggal_lhr');
            $table->enum('jenis_kelamin',['lk', 'pr']);
            $table->string('rt');
            $table->string('rw');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('agama');
            $table->string('status_kawin');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('goldar');
            $table->string('ktp_path');
            $table->string('kk_path');
            $table->string('ttd_path');
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
        Schema::dropIfExists('warga');
    }
}

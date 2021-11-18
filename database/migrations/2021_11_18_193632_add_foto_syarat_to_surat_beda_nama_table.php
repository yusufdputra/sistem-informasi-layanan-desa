<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoSyaratToSuratBedaNamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_beda_nama', function (Blueprint $table) {
            $table->string('pengantar_path')->nullable();
            $table->string('dokumen_beda')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_beda_nama', function (Blueprint $table) {
            $table->dropColumn('pengantar_path');
            $table->dropColumn('dokumen_beda');
        });
    }
}

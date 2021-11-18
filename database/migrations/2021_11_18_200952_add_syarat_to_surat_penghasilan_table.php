<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSyaratToSuratPenghasilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_penghasilan', function (Blueprint $table) {
            $table->string('pengantar_path')->nullable();
            $table->string('tujuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_penghasilan', function (Blueprint $table) {
            $table->string('pengantar_path')->nullable();
            $table->string('tujuan')->nullable();
        });
    }
}

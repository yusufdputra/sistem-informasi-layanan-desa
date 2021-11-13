<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratDomisiliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_domisili', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengajuan');
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
        Schema::dropIfExists('surat_domisili');
    }
}

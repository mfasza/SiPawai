<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenSpmtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_spmts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat');
            $table->date('tgl_spmt');
            $table->string('file_loc');
            $table->bigInteger('nip')->unsigned();
            $table->timestamps();
            $table->foreign('nip')->references('nip')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_spmts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenKgbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_kgbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat');
            $table->date('tgl_kgb');
            $table->string('file_loc')->nullable();
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
        Schema::dropIfExists('dokumen_kgbs');
    }
}

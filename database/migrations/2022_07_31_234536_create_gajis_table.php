<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('gaji');
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
        Schema::dropIfExists('gajis');
    }
}

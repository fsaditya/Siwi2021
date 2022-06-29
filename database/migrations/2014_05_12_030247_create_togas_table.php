<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTogasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('togas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->string('size_toga');
            $table->string('no_wa');
            $table->string('asal_daerah');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('kebutuhan_pendamping');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('togas');
    }
}

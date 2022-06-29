<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersembahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persembahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->string('nama_tim');
            $table->string('nama_pj');
            $table->string('npm_pj');
            $table->string('line_pj');
            $table->string('jenis_persembahan');
            $table->string('jumlah_personil');
            $table->string('link_youtube');
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
        Schema::dropIfExists('persembahans');
    }
}

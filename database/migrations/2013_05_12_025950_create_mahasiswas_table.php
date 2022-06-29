<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('npm');
            $table->string('nama');
            $table->string('kelas');
            $table->string('absen');
            $table->integer('prodi_id')->unsigned();
            $table->string('jenis_kelamin');
            $table->string ('status_registrasi')->default(0);
            $table->string ('status_ambil_toga');
            $table->timestamps();

            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}

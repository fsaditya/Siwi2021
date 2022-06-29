<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeringanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keringanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->string('file_keringanan');
            $table->string('jumlah_keringanan')->nullable();
            $table->string('inv_lunas')->nullable();
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
        Schema::dropIfExists('keringanans');
    }
}

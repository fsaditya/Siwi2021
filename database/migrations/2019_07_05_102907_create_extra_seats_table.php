<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_seats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->string('order_id');
            $table->integer('jatah_xs')->default(5);
            $table->integer('jumlah_xs')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('extra_seats');
    }
}

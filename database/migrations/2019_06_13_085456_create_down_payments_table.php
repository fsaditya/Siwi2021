<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('down_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->string('order_id');
            $table->string('type');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('down_payments');
    }
}

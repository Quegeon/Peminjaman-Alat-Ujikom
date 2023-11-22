<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis');
            $table->string('nama_alat',50);
            $table->integer('stok');
            $table->integer('denda');
            $table->integer('batas_pinjam');
            $table->timestamps();
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alats');
    }
}

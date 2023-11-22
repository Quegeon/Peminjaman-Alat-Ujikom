<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->string('id_member');
            $table->unsignedBigInteger('id_alat');
            $table->unsignedBigInteger('id_petugas');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')
                ->nullable();
            $table->integer('jumlah_pinjam');
            $table->integer('total_denda')
                ->default(0);
            $table->enum('status',['Kembali','Pinjam'])
                ->default('Pinjam');
            $table->timestamps();
            $table->foreign('id_petugas')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_alat')->references('id')->on('alats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
}

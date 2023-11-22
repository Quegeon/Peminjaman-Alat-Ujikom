<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_member',5)
                ->nullable();
            $table->string('nama',100);
            $table->string('username',25);
            $table->string('password',255);
            $table->string('no_telp',13);
            $table->string('email',50);
            $table->string('alamat',255)
                ->nullable();
            $table->enum('level',['Admin','Petugas','Member'])
                ->default('Member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

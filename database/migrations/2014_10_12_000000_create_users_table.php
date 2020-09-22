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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('foto')->nullable();
            $table->string('ava')->nullable();
            $table->string('images')->nullable();
            $table->string('fullname')->nullable();
            $table->boolean('konfirmasi')->default(false);
            $table->boolean('verifikasi')->nullable();
            $table->string('gender')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('domisili')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('nik')->nullable();
            $table->string('telp')->unique();
            $table->string('wa')->nullable();
            $table->rememberToken();
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

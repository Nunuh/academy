<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaInstansi');
            $table->string('telp');
            $table->string('alamat');
            $table->string('kota');
            $table->string('namaPic');
            $table->string('email')->unique();
            $table->string('nama')->nullable();
            $table->text('gambar')->nullable();
            $table->string('url')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('background')->nullable();
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
        Schema::dropIfExists('institutions');
    }
}

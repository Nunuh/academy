<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->foreign('institution_id')
                ->references('id')
                ->on('institutions')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')
                ->references('id')
                ->on('kategoris')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
            $table->text('image');
            $table->text('modul')->nullable();
            $table->bigInteger('harga')->unsigned();
            $table->bigInteger('sale')->unsigned();
            $table->string('kode')->unique();
            $table->string('url');
            $table->text('kit');
            $table->string('judul');
            $table->string('slug_judul');
            $table->string('waktu');
            $table->string('jam');
            $table->string('tempat');
            $table->string('level');
            $table->string('kota');
            $table->string('start_tgl');
            $table->string('end_tgl');
            $table->string('certificate');
            $table->string('sertif')->nullable();
            $table->text('deskripsi');
            $table->text('alat')->nullable();
            $table->text('bahan')->nullable();
            $table->text('cara')->nullable();
            $table->boolean('tampil');
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
        Schema::dropIfExists('workshops');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
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
            $table->string('video');
            $table->text('thumbnail');
            $table->bigInteger('harga')->unsigned();
            $table->bigInteger('sale')->unsigned();
            $table->string('kode')->unique();
            $table->string('judul');
            $table->string('durasi');
            $table->string('slug_judul');
            $table->string('subject');
            $table->string('level');
            $table->string('language');
            $table->string('subtitle');
            $table->string('quizzes');
            $table->string('certificate');
            $table->string('url');
            $table->string('start_tgl');
            $table->string('end_tgl');
            $table->text('deskripsi')->nullable();
            $table->text('syllabus')->nullable();
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
        Schema::dropIfExists('courses');
    }
}

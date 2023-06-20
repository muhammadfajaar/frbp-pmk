<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disasters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disaster_category_id');
            $table->foreignId('subdistrict_id');
            $table->string('penyebab');
            $table->string('slug')->uniqid();
            $table->text('location');
            $table->string('waktu');
            $table->integer('hilang')->nullable();
            $table->integer('meninggal_dunia')->nullable();
            $table->integer('mengungsi')->nullable();
            $table->integer('luka_luka')->nullable();
            $table->integer('rumah_rusak_ringan')->nullable();
            $table->integer('rumah_rusak_sedang')->nullable();
            $table->integer('rumah_rusak_berat')->nullable();
            $table->integer('rumah_terendam')->nullable();
            $table->integer('fas_pendidikan')->nullable();
            $table->integer('fas_ibadah')->nullable();
            $table->integer('fas_kesehatan')->nullable();
            $table->integer('fas_umum')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('disasters');
    }
}

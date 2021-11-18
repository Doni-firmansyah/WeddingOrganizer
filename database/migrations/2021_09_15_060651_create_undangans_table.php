<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('keterangan_paket', ['undangan', 'wo'])->nullable();
            $table->integer('lama_pengerjaan')->nullable();
            $table->enum('harga', ['0'])->nullable();
            $table->integer('bintang')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('undangans');
    }
}

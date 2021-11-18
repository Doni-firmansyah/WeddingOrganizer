<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->onDelete('cascade') ;
            $table->enum('keterangan_paket', ['undangan', 'wo']);
            $table->enum('tipe', ['custom', 'reguler','belum']);
            $table->string('nama');
            $table->string('gambar');
            $table->integer('harga');
            $table->string('bintang');
            $table->string('keterangan');
            $table->string('product1')->nullable();
            $table->string('product2')->nullable();
            $table->string('product3')->nullable();
            $table->string('product4')->nullable();
            $table->string('product5')->nullable();
            $table->string('product6')->nullable();
            $table->string('product7')->nullable();
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
        Schema::dropIfExists('wos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->char('nama_product', 50)->unique();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->char('categorys', 50);
            $table->integer('harga');
            $table->string('keterangan');
            $table->char('gambar', 50);
            $table->char('gambar2', 50);
            $table->char('gambar3', 50);
            $table->char('gambar4', 50)->nullable();
            $table->char('gambar5', 50)->nullable();
            $table->char('status', 50)->nullable();
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
        Schema::dropIfExists('vendors');
    }
}

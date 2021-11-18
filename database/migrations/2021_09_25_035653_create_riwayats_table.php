<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id');
            $table->foreignId('user_id')->constrained('users');
            $table->date('tgl_acara')->nullable();
            $table->char('nama_pemesan')->nullable();
            $table->string('pesan')->nullable();
            $table->integer('jumlah_harga')->nullable();
            $table->foreignId('status_id')->constrained('statuses');
            $table->char('status_dp')->nullable();
            $table->integer('nominal_dp')->nullable();
            $table->string('gambar_dp')->nullable();
            $table->char('status_pelunasan')->nullable();
            $table->integer('nominal_pelunasan')->nullable();
            $table->string('gambar_pelunasan')->nullable();
            $table->string('nama_pria')->nullable();
            $table->string('ttlpria')->nullable();
            $table->string('namaayahpria')->nullable();
            $table->string('namaibupria')->nullable();
            $table->string('namawanita')->nullable();
            $table->string('ttlwanita')->nullable();
            $table->string('namaayahwanita')->nullable();
            $table->string('namaibuwanita')->nullable();
            $table->string('alamatacara')->nullable();
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
        Schema::dropIfExists('riwayats');
    }
}

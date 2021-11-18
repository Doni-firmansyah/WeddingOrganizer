<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksidetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksidetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id');
            $table->foreignId('user_id');
            $table->foreignId('vendor_id');
            // $table->foreignId('riwayat_id'); 'nama_vendor' => $userid->user_id,
             //   'product_vendor' => $vedorid->nama_product,
            // $table->foreignId('user_id');
            // $table->foreignId('wo_id');
            $table->string('pesan')->nullable();
            $table->char('tgl_acara')->nullable();
            $table->char('lokasi')->nullable();
            $table->char('nama_pemesan')->nullable();
            $table->char('status_dp')->nullable();
            $table->integer('nominal_dp')->nullable();
            $table->char('bukti_dp')->nullable();
            $table->char('status_pelunasan')->nullable();
            $table->integer('nominal_pelunasan')->nullable();
            $table->char('bukti_pelunasan')->nullable();
            $table->char('nama_vendor')->nullable();
            $table->char('product_vendor')->nullable();
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
        Schema::dropIfExists('transaksidetails');
    }
}

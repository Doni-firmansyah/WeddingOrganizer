<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::create([
            'nama_status' => 'Menunggu',
            'keterangan' => 'Menunggu',
            'pesanan_user' => 'Sudah Pesan, Menunggu Pembayaran',
            'pesanan_admin' => 'Menunggu',
            'pembayaran_user'=> 'Menunggu Verifikasi',
            'pembayaran_admin'=> 'Menunggu',
        ]);
        Status::create([
            'nama_status' => 'Diterima',
            'keterangan' => 'Diterima',
            'pesanan_user' => 'Pesanan Diproses',
            'pesanan_admin' => 'Diterima',
            'pembayaran_user'=> 'Terverifikasi',
            'pembayaran_admin'=> 'Diterima',
        ]);
        Status::create([
            'nama_status' => 'Tidak',
            'keterangan' => 'Tidak',
            'pesanan_user' => 'Pesanan Selesai',
            'pesanan_admin' => 'Selesai',
            'pembayaran_user'=> 'Pembayaran tidak valid',
            'pembayaran_admin'=> 'Tidak',
        ]);
        Status::create([
            'pesanan_user' => 'Pesanan Gagal Pembayaran Tidak Valid',
            'pesanan_admin' => 'Tidak',
        ]);
    }
}

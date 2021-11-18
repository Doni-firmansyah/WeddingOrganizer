<?php

namespace Database\Seeders;

use App\Models\Statustransaksi;
use Illuminate\Database\Seeder;

class StatustransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Statustransaksi::create([
            'admin' => 'Belum',
            'user' => 'Belum',
        ]);
        Statustransaksi::create([
            'admin' => 'Sudah',
            'user' => 'Sudah',
        ]);
        Statustransaksi::create([
            'admin' => 'Tidak',
            'user' => 'Tidak',
        ]);
    }
}

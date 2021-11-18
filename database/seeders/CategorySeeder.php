<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'nama_category' => 'Weding Organizer',
            'keterangan' => 'Weding Organizer',
        ]);
        Category::create([
            'nama_category' => 'Gedung',
            'keterangan' => 'Gedung',
        ]);
        Category::create([
            'nama_category' => 'Katering',
            'keterangan' => 'Katering',
        ]);
        Category::create([
            'nama_category' => 'Riasan',
            'keterangan' => 'Riasan',
        ]);
        Category::create([
            'nama_category' => 'Dekor',
            'keterangan' => 'Dekor',
        ]);
        Category::create([
            'nama_category' => 'Hiburan',
            'keterangan' => 'Hiburan',
        ]);
        Category::create([
            'nama_category' => 'Lain-Lain',
            'keterangan' => 'Lain-Lain',
        ]);
    }
}

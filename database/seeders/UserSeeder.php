<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Doni',
            'role' => 'admin',
            'alamat'=>'malang',
            'handphone'=>'0812345678',
            'nama_vendor' => 'Doni Vendor',
            'instagram_vendor' => 'donifirmansyah_',
            'alamat_usaha' => 'gak punya usaha',
            'telp_vendor' => '08122333',
            'email'=>'doni@gmail.com',
            'email_verified_at'=>'2021-10-20 09:56:11',
            'email_vendor'=>'doni@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
        User::create([
            'name' => 'DoniCeo',
            'role' => 'Ceo',
            'alamat'=>'malang',
            'handphone'=>'0812345678',
            'nama_vendor' => 'Doni Vendor',
            'instagram_vendor' => 'donifirmansyah_',
            'alamat_usaha' => 'gak punya usaha',
            'telp_vendor' => '08122333',
            'email'=>'DoniCeo@gmail.com',
            'email_verified_at'=>'2021-10-20 09:56:11',
            'email_vendor'=>'doni@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
        User::create([
            'name' => 'DoniFinance',
            'role' => 'Finance',
            'alamat'=>'malang',
            'handphone'=>'0812345678',
            'nama_vendor' => 'Doni Vendor',
            'instagram_vendor' => 'donifirmansyah_',
            'alamat_usaha' => 'gak punya usaha',
            'telp_vendor' => '08122333',
            'email'=>'DoniFinance@gmail.com',
            'email_verified_at'=>'2021-10-20 09:56:11',
            'email_vendor'=>'doni@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
        User::create([
            'name' => 'DoniClientmanagent',
            'role' => 'Clientmanagent',
            'alamat'=>'malang',
            'handphone'=>'0812345678',
            'nama_vendor' => 'Doni Vendor',
            'instagram_vendor' => 'donifirmansyah_',
            'alamat_usaha' => 'gak punya usaha',
            'telp_vendor' => '08122333',
            'email'=>'DoniClientmanagent@gmail.com',
            'email_verified_at'=>'2021-10-20 09:56:11',
            'email_vendor'=>'doni@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
        User::create([
            'name' => 'DoniVendormanagent',
            'role' => 'Vendormanagent',
            'alamat'=>'malang',
            'handphone'=>'0812345678',
            'nama_vendor' => 'Doni Vendor',
            'instagram_vendor' => 'donifirmansyah_',
            'alamat_usaha' => 'gak punya usaha',
            'telp_vendor' => '08122333',
            'email'=>'DoniVendormanagent@gmail.com',
            'email_verified_at'=>'2021-10-20 09:56:11',
            'email_vendor'=>'doni@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
    }
}

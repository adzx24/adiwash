<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'admin',
            // 'email'=>'admin@gmail.com',
            'password'=>bcrypt(2),
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'kasir',
            // 'email'=>'kasir@gmail.com',
            'password'=>bcrypt(2),
            'role'=>'kasir'
        ]);
        User::create([
            'name'=>'owner',
            // 'email'=>'owner@gmail.com',
            'password'=>bcrypt(2),
            'role'=>'owner'
        ]);

        produk::create([
            'paket'=>'paket 1',
            'harga'=>20000,
           
            'deskripsi'=>'Membersihkan body mobil'
        ]);
        produk::create([
            'paket'=>'paket 2',
            'harga'=>25000,

            'deskripsi'=>'Membersihkan body mobil dan interior'
        ]);

        transaksi::create([
            'notelp'=>'084848',
            'nama'=>'adi',
            'namapaket'=>'paket 4',
            'harga'=>8000,
            'nominal'=>90000,
            'kembalian'=>82000,
            'user_id'=>1,
            'produk_id'=>1
        ]);
    }
}

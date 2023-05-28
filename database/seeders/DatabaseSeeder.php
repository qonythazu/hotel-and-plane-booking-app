<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\transaksi;
use App\Models\produk;
use App\Models\jadwal;
use App\Models\role;
use App\Models\jenis;
use App\Models\kamar;

use Carbon\Carbon;

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


        // --data testing-- //

        // MEMBUAT USER
        role::create([
            'role'=> 'admin'
        ]);
        role::create([
            'role'=> 'mitra'
        ]);
        role::create([
            'role'=> 'pengguna'
        ]);

        // MEMBUAT USER

        User::create([
            'name'=> 'Destiera Fitryani',
            'slug'=> 'destiera-fitryani',
            'email'=> 'destiera@gmail.com',
            'password'=> bcrypt('desti0012'),
            'role_id'=> 1
        ]);

        User::create([
            'name'=> 'Putri Qonytha',
            'slug'=> 'putri-qonytha',
            'email'=> 'pqonita@gmail.com',
            'password'=> bcrypt('qonythazu'),
            'role_id'=> 2
        ]);

        User::create([
            'name'=> 'Shinta Adelia',
            'slug'=> 'shinta-adelia',
            'email'=> 'shintaa@gmail.com',
            'password'=> bcrypt('sh1nt4'),
            'role_id'=> 2
        ]);

        User::create([
            'name'=> 'Nadhira Rizqana',
            'slug'=> 'nadhira-rizqana',
            'email'=> 'nadh@gmail.com',
            'password'=> bcrypt('nara166'),
            'role_id'=> 3
        ]);

        User::create([
            'name'=> 'Putri Oktatriani',
            'slug'=> 'putri-oktatriani',
            'email'=> 'putriokta@gmail.com',
            'password'=> bcrypt('putri05'),
            'role_id'=> 3
        ]);

        // MEMBUAT EWALLET

        transaksi::create([
            'user_id' => 2,
            'saldo_awal' => 0,
            'debit' => 0,
            'kredit' => 2000000,
            'saldo_akhir' => 2000000,
            'keterangan' => 'tip pembookingan hotel'

        ]);

        transaksi::create([
            'user_id' => 3,
            'saldo_awal' => 0,
            'debit' => 0,
            'kredit' => 5000000,
            'saldo_akhir' => 5000000,
            'keterangan' => 'tip pembookingan pesawat'

        ]);

        transaksi::create([
            'user_id' => 4,
            'saldo_awal' => 500000,
            'debit' => 0,
            'kredit' => 0,
            'saldo_akhir' => 500000,
            'keterangan' => 'topup perdana'

        ]);

        transaksi::create([
            'user_id' => 5,
            'saldo_awal' => 1000000,
            'debit' => 0,
            'kredit' => 0,
            'saldo_akhir' => 1000000,
            'keterangan' => 'topup perdana'

        ]);

        // MEMBUAT JENIS PRODUK
        jenis::create([
            'jenis' => 'pesawat',
        ]);

        jenis::create([
            'jenis' => 'hotel',
        ]);

        // MEMBUAT PRODUK

        produk::create([
            'nama_produk'=> 'Citilink',
            'deskripsi'=> 'Ekonomi',
            'user_id' => 2,
            'jenis_id' => 1
        ]);

        produk::create([
            'nama_produk'=> 'Citilink',
            'deskripsi'=> 'Bisnis',
            'user_id' => 2,
            'jenis_id' => 1
        ]);

        produk::create([
            'nama_produk'=> 'Lion Air',
            'deskripsi'=> 'Ekonomi',
            'user_id' => 3,
            'jenis_id' => 1
        ]);

        produk::create([
            'nama_produk'=> 'Lion Air',
            'deskripsi'=> 'Bisnis',
            'user_id' => 3,
            'jenis_id' => 1
        ]);

        produk::create([
            'nama_produk'=> 'Aston',
            'deskripsi'=> 'Balikpapan',
            'user_id' => 2,
            'jenis_id' => 2
        ]);

        produk::create([
            'nama_produk'=> 'Borneo Bay',
            'deskripsi'=> 'Samarinda',
            'user_id' => 2,
            'jenis_id' => 2
        ]);

        produk::create([
            'nama_produk'=> 'Aston',
            'deskripsi'=> 'Bontang',
            'user_id' => 2,
            'jenis_id' => 2
        ]);

        produk::create([
            'nama_produk'=> 'Pasifica',
            'deskripsi'=> 'Balikpapan',
            'user_id' => 3,
            'jenis_id' => 2
        ]);

        produk::create([
            'nama_produk'=> 'Pasifica',
            'deskripsi'=> 'Sangatta',
            'user_id' => 3,
            'jenis_id' => 2
        ]);

        produk::create([
            'nama_produk'=> 'Novotel',
            'deskripsi'=> 'Samarinda',
            'user_id' => 3,
            'jenis_id' => 2
        ]);

        // MEMBUAT JADWAL PESAWAT

        jadwal::create([
            'produk_id'=> 1,
            'kota_asal' => 'Balikpapan',
            'kota_tiba' => 'Banjarmasin',
            'tgl_pergi' => '2023-06-12',
            'tgl_tiba' => '2023-06-12',
            'waktu_pergi' => '10:10:00',
            'waktu_tiba' => '13:30:00',
            'jumlah' => 3,
            'harga' => 500000
        ]);

        jadwal::create([
            'produk_id'=> 2,
            'kota_asal' => 'Samarinda',
            'kota_tiba' => 'Balikpapan',
            'tgl_pergi' => '2023-06-20',
            'tgl_tiba' => '2023-06-20',
            'waktu_pergi' => '12:00:00',
            'waktu_tiba' => '15:25:00',
            'jumlah' => 3,
            'harga' => 1000
        ]);

        jadwal::create([
            'produk_id'=> 3,
            'kota_asal' => 'Banjarmasin',
            'kota_tiba' => 'Balikpapan',
            'tgl_pergi' => '2023-06-12',
            'tgl_tiba' => '2023-06-12',
            'waktu_pergi' => '08:30:00',
            'waktu_tiba' => '12:00:00',
            'jumlah' => 3,
            'harga' => 400000
        ]);

        jadwal::create([
            'produk_id'=> 4,
            'kota_asal' => 'Banjarmasin',
            'kota_tiba' => 'Samarinda',
            'tgl_pergi' => '2023-06-20',
            'tgl_tiba' => '2023-06-20',
            'waktu_pergi' => '18:44:00',
            'waktu_tiba' => '22:25:00',
            'jumlah' => 3,
            'harga' => 1200000
        ]);

        // MEMBUAT JADWAL PESAWAT

        kamar::create([
            'produk_id' => 5,
            'harga' => 200000,
            'jumlah' => 3,
            'check_in' => '2023-06-20'
        ]);

        kamar::create([
            'produk_id' => 6,
            'harga' => 300000,
            'jumlah' => 3,
            'check_in' => '2023-06-09'
        ]);

        kamar::create([
            'produk_id' => 7,
            'harga' => 150000,
            'jumlah' => 3,
            'check_in' => '2023-06-20'
        ]);

        kamar::create([
            'produk_id' => 8,
            'harga' => 95000,
            'jumlah' => 3,
            'check_in' => '2023-06-23'
        ]);

        kamar::create([
            'produk_id' => 9,
            'harga' => 550000,
            'jumlah' => 3,
            'check_in' => '2023-06-22'
        ]);

        $now = Carbon::now();

        kamar::create([
            'produk_id' => 9,
            'harga' => 1000,
            'jumlah' => 3,
            'check_in' => $now
        ]);

        kamar::create([
            'produk_id' => 10,
            'harga' => 25000,
            'jumlah' => 3,
            'check_in' => $now
        ]);
    }
}

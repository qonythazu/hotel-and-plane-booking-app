<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\transaksi;
use App\Models\produk;
use App\Models\detail_produk;
use App\Models\jadwal;

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

        User::create([
            'name'=> 'Destiera Fitryani',
            'email'=> 'destiera@gmail.com',
            'password'=> bcrypt('desti0012'),
            'role'=> 'admin'
        ]);

        User::create([
            'name'=> 'Putri Qonytha',
            'email'=> 'pqonita@gmail.com',
            'password'=> bcrypt('qonytazu'),
            'role'=> 'mitra'
        ]);

        User::create([
            'name'=> 'Shinta Adelia',
            'email'=> 'shintaa@gmail.com',
            'password'=> bcrypt('sh1nt4'),
            'role'=> 'mitra'
        ]);

        User::create([
            'name'=> 'Nadhira Rizqana',
            'email'=> 'nadh@gmail.com',
            'password'=> bcrypt('nara166'),
            'role'=> 'pengguna'
        ]);

        User::create([
            'name'=> 'Putri Oktatriani',
            'email'=> 'putriokta@gmail.com',
            'password'=> bcrypt('putri05'),
            'role'=> 'pengguna'
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

        // MEMBUAT PRODUK
        
        produk::create([
            'user_id'=> 2,
            'nama_produk'=> 'Lion Air',
            'produk' => 'pesawat',
            'deskripsi'=> 'BPN-SMD'
        ]);
        
        produk::create([
            'user_id'=> 2,
            'nama_produk'=> 'Borneo Air',
            'produk' => 'pesawat',
            'deskripsi'=> 'PPU-BJM'
        ]);

        produk::create([
            'user_id'=> 3,
            'nama_produk'=> 'Aston',
            'produk' => 'hotel',
            'deskripsi'=> 'Bontang'
        ]);

        produk::create([
            'user_id'=> 3,
            'nama_produk'=> 'Pasifica',
            'produk' => 'hotel',
            'deskripsi'=> 'Balikpapan'
        ]);
        
        // MEMBUAT DETAILPRODUK

        detail_produk::create([
            'produk_id'=> 1,
            'nomor'=> 1,
            'harga'=> 3500000
        ]);

        detail_produk::create([
            'produk_id'=> 1,
            'nomor'=> 2,
            'harga'=> 3500000
        ]);

        detail_produk::create([
            'produk_id'=> 1,
            'nomor'=> 3,
            'harga'=> 3500000
        ]);
        
        detail_produk::create([
            'produk_id'=> 2,
            'nomor'=> 1,
            'harga'=> 1600000
        ]);

        detail_produk::create([
            'produk_id'=> 2,
            'nomor'=> 2,
            'harga'=> 1600000
        ]);

        detail_produk::create([
            'produk_id'=> 2,
            'nomor'=> 3,
            'harga'=> 1600000
        ]);

        detail_produk::create([
            'produk_id'=> 3,
            'nomor'=> 10,
            'harga'=> 500000
        ]);

        detail_produk::create([
            'produk_id'=> 3,
            'nomor'=> 11,
            'harga'=> 500000
        ]);

        detail_produk::create([
            'produk_id'=> 4,
            'nomor'=> 12,
            'harga'=> 780000
        ]);

        detail_produk::create([
            'produk_id'=> 4,
            'nomor'=> 13,
            'harga'=> 780000
        ]);

        // MEMBUAT JADWAL PRODUK
        
        jadwal::create([
            'produk_id'=> 1,
            'waktu'=> '2023-03-20 07:30:00'
        ]);

        jadwal::create([
            'produk_id'=> 2,
            'waktu'=> '2023-05-12 10:10:00'
        ]);

        jadwal::create([
            'produk_id'=> 3,
            'waktu'=> '2023-02-14 13:00:00'
        ]);

        jadwal::create([
            'produk_id'=> 2,
            'waktu'=> '2023-02-14 13:00:00'
        ]);


    }
}

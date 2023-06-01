<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('produk_id')->constrained()->onDelete('cascade');
            $table->foreignId('kamar_id')->nullable()->constrained('kamars')->onDelete('cascade');
            $table->foreignId('jadwal_id')->nullable()->constrained('jadwals')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('nama_pemesan');
            $table->string('nomor_hp');
            $table->text('deskripsi');
            $table->integer('qty');
            $table->integer('total_harga');
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
};

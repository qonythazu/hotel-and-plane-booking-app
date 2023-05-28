<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\kamar;
use App\Models\jadwal;
use App\Models\HistoryTransaksi;
use App\Models\transaksi;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    function pembatalan($id){
        $booking = booking::with('kamar', 'jadwal')
                ->find($id);

        if(!empty($booking->kamar->check_in)){
            if (Carbon::parse($booking->kamar->check_in)->between(Carbon::now(),Carbon::now()->addDays(2))) {
                // Menampilkan popup atau pesan error
                return redirect('/pesanan_saya')->with('error', 'Maaf! Pesanan Tidak Dapat Dibatalkan, Lakukan Pembatalan Minimal H-2');
            }
        }elseif(!empty($booking->jadwal->tgl_pergi)){
            if (Carbon::parse($booking->jadwal->tgl_pergi)->between(Carbon::now(),Carbon::now()->addDays(2))) {
                // Menampilkan popup atau pesan error
                return redirect('/pesanan_saya')->with('error', 'Maaf! Pesanan Tidak Dapat Dibatalkan, Lakukan Pembatalan Minimal H-2');
            }
        }

        $booking->status = 'dibatalkan';
        $booking->save();

        $transaksi = new HistoryTransaksi();
        $transaksi->user_id = auth()->user()->id;
        $transaksi->debit = $booking->total_harga;
        $transaksi->kredit = 0;
        $transaksi->keterangan = 'pembatalan pesanan';

        $transaksi->save();

        $ewallet = transaksi::where('user_id',auth()->user()->id)->first();
        $ewallet->update(['saldo_awal' => $ewallet->saldo_akhir]);
        $saldo_akhir = $ewallet->saldo_akhir + $booking->total_harga;
        $ewallet->update(['saldo_akhir' => $saldo_akhir]);
        $ewallet->update(['debit' => $booking->total_harga]);
        $ewallet->update(['kredit' => 0]);
        $ewallet->update(['keterangan' => 'pembatalan pesanan' ]);

        if(!empty($booking->kamar_id)){
            $kamar = kamar::where('id', $booking->kamar_id)->first();
            $jml = $kamar->jumlah + intval($booking->qty);
            $kamar->update(['jumlah' => $jml]);
        }elseif(!empty($booking->jadwal_id)){
            $jadwal = jadwal::where('id', $booking->jadwal_id)->first();
            $jml = $jadwal->jumlah + intval($booking->qty);
            $jadwal->update(['jumlah' => $jml]);
        }

        // dd($booking);

        return redirect('/pesanan_saya');
    }
}

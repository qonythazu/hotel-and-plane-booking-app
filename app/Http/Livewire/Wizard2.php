<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Livewire\Component;

use App\Models\booking;
use App\Models\transaksi;
use App\Models\HistoryTransaksi;
use App\Models\jadwal;
use App\Models\produk;

use Carbon\Carbon;

class Wizard2 extends Component
{
    public $data;
    public $currentStep = 1;
    public $user_id, $produk_id, $deskripsi, $kamar_id, $jadwal_id, $nomor_hp, $jumlah, $tanggal, $total_harga, $status;
    public $tittle = [];
    public $nama_penumpang = [];
    public $successMessage = '';

        public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->nama_pemesan = Auth::user()->name;
        $this->tanggal = now()->toDateString();
        $this->status = "Menunggu Pembayaran";
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.wizard2');
    }
/**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        foreach ($this->data as $d) {
        $validatedData = $this->validate([
                'jumlah' => 'required|numeric|min:1|max:'. $d->jumlah
            ]);
        };

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'nama_pemesan' => 'required',
            'nama_penumpang' => 'required',
            'tittle' => 'required',
            'nomor_hp' => 'required|numeric|digits_between:9,15',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        $deskripsi = '';

        foreach ($this->tittle as $index => $tittleValue) {
            $penumpang = $this->nama_penumpang[$index];
            $kode = strtoupper(Str::random(4));
            foreach ($this->data as $d) {
                $d1 = "$d->kota_asal &nbsp; -> ". Carbon::parse($d->tgl_pergi)->Format('l, d F Y') . " $d->waktu_pergi";
                $d2 = "$d->kota_tiba &nbsp; -> ". Carbon::parse($d->tgl_tiba)->Format('l, d F Y') . " $d->waktu_tiba";
            }
            $deskripsi .= "<strong>Kode Booking: $kode<br>Passenger : $tittleValue. $penumpang</strong><br>$d1<br>$d2<br><br>";
        }

        foreach ($this->data as $d) {
            $this->produk_id = $d->produk->id;
            $this->total_harga = $d->harga*intval($this->jumlah);
            $id_jadwal = $d->id;
        };


        $saldoPengguna = transaksi::where('user_id', auth()->user()->id)->value('saldo_akhir');

        if ($this->total_harga > $saldoPengguna) {
            // Menampilkan popup atau pesan error
            session()->flash('error', 'Saldo Anda tidak mencukupi.');
            return;
        }
        // $arrr = [
        //     $this->user_id,
        //     $this->produk_id,
        //     $id_jadwal,
        //     $this->nomor_hp,
        //     $this->tanggal,
        //     $this->total_harga,
        //     $this->status,
        //     $this->tittle,
        //     $this->nama_penumpang,
        //     $deskripsi,
        //     $this->nama_pemesan,
        //     $this->jumlah
        // ];

        // dd($arrr);

        Booking::create([
            'user_id' => $this->user_id,
            'produk_id' => $this->produk_id,
            'kamar_id' => null,
            'jadwal_id' => $id_jadwal,
            'tanggal' => $this->tanggal,
            'nama_pemesan' => $this->nama_pemesan,
            'nomor_hp' => $this->nomor_hp,
            'deskripsi' => $deskripsi,
            'qty' => $this->jumlah,
            'total_harga' => $this->total_harga,
            'status' => "lunas",
        ]);

        $transaksi = new HistoryTransaksi();
        $transaksi->user_id = auth()->user()->id;
        $transaksi->debit = 0;
        $transaksi->kredit = $this->total_harga;
        foreach ($this->data as $d) {
            $transaksi->keterangan = 'Pesan Tiket Pesawat ' . $d->produk->nama_produk .' (' . $d->produk->deskripsi . ')'.' sebanyak '. $this->jumlah . ' kursi';
        };
        $transaksi->save();

        $ewallet = transaksi::where('user_id',auth()->user()->id)->first();
        $ewallet->update(['saldo_awal' => $ewallet->saldo_akhir]);
        $saldo_akhir = $ewallet->saldo_akhir - $this->total_harga;
        $ewallet->update(['saldo_akhir' => $saldo_akhir]);
        $ewallet->update(['debit' => 0]);
        $ewallet->update(['kredit' => $this->total_harga]);
        foreach ($this->data as $d) {
            $ewallet->update(['keterangan' => 'Pesan Tiket Pesawat ' . $d->produk->nama_produk .' (' . $d->produk->deskripsi . ')'.' sebanyak '. $this->jumlah . ' kursi' ]);
        };

        $kursi = jadwal::where('id',$id_jadwal)->first();
        $new_jumlah = $kursi->jumlah - intval($this->jumlah);
        $kursi->update(['jumlah' => $new_jumlah]);

        if($kursi->jumlah <= 0){
            $kursi->update(['jumlah' => 0]);
        }



        // $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;

        return redirect('/pesanan_saya')->with('success', 'Pembayaran Berhasil!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->jumlah = '';
        $this->nama_pemesan = '';
        $this->nomor_hp = '';
        $this->tittle = '';
        $this->nama_penumpang = '';
    }
}

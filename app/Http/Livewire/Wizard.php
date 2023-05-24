<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use App\Models\booking;
use App\Models\transaksi;
use App\Models\HistoryTransaksi;
use App\Models\kamar;
use App\Models\produk;

class Wizard extends Component
{
    public $data;
    public $currentStep = 1;
    public $user_id, $produk_id, $nomor_hp, $jumlah, $tanggal, $total_harga, $status;
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
        return view('livewire.wizard');
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
        foreach ($this->data as $d) {
            $this->produk_id = $d->produk_id;
            $this->total_harga = $d->harga * intval($this->jumlah);
            $id_kamar = $d->id;
        };


        $saldoPengguna = transaksi::where('user_id', auth()->user()->id)->value('saldo_akhir');

        if ($this->total_harga > $saldoPengguna) {
            // Menampilkan popup atau pesan error
            session()->flash('error', 'Saldo Anda tidak mencukupi.');
            return;
        }
        // $arrr = [
        //     $id_kamar,
        //     $this->user_id,
        //     $this->produk_id,
        //     $this->nomor_hp,
        //     $this->tanggal,
        //     $this->total_harga,
        //     $this->status,
        //     $this->nama_pemesan
        // ];
        // dd($arrr);

        Booking::create([
            'user_id' => $this->user_id,
            'produk_id' => $this->produk_id,
            'tanggal' => $this->tanggal,
            'nama_pemesan' => $this->nama_pemesan,
            'nomor_hp' => $this->nomor_hp,
            'total_harga' => $this->total_harga,
            'status' => "sedang diproses",
        ]);

        $transaksi = new HistoryTransaksi();
        $transaksi->user_id = auth()->user()->id;
        $transaksi->debit = 0;
        $transaksi->kredit = $this->total_harga;
        foreach ($this->data as $d) {
            $transaksi->keterangan = 'booking kamar ' . $d->produk->nama_produk .' '. $d->produk->deskripsi;
        };
        $transaksi->save();

        $ewallet = transaksi::where('user_id',auth()->user()->id)->first();
        $ewallet->update(['saldo_awal' => $ewallet->saldo_akhir]);
        $saldo_akhir = $ewallet->saldo_akhir - $this->total_harga;
        $ewallet->update(['saldo_akhir' => $saldo_akhir]);
        $ewallet->update(['debit' => 0]);
        $ewallet->update(['kredit' => $this->total_harga]);
        foreach ($this->data as $d) {
            $ewallet->update(['keterangan' => 'booking kamar ' . $d->produk->nama_produk .' '. $d->produk->deskripsi ]);
        };

        $kamar = kamar::where('id',$id_kamar)->first();
        $new_jumlah = $kamar->jumlah - intval($this->jumlah);
        $kamar->update(['jumlah' => $new_jumlah]);

        if($kamar->jumlah <= 0){
            $kamar = kamar::where('id',$id_kamar)->delete();
        }



        // $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;

        return redirect('/pesanan_saya');
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
        $this->user_id = '';
        $this->produk_id = '';
        $this->nama_pemesan = '';
        $this->nomor_hp = '';
        $this->tanggal = '';
        $this->total_harga = '';
        $this->status = '';
    }
}

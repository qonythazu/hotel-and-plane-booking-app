<div>

    @if(!empty($successMessage))
    <div class="alert alert-success">
       {{ $successMessage }}
    </div>
    @endif

    <div class="d-flex text-center">
        <!-- progressbar -->
        <ul class="progressbar">
            <li class="{{ $currentStep > 1 ? 'complete' : '' }} {{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button" style="text-decoration: none;">Pesanan</a></li>
            <li class="{{ $currentStep > 2 ? 'complete' : '' }}{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button" style="text-decoration: none;">Data Diri</a></li>
            <li class="{{ $currentStep != 3 ? '' : 'complete active' }}"><a href="#step-3" type="button"  style="text-decoration: none;" disabled="disabled">Konfirmasi</a></li>
        </ul>
    </div>


    @foreach ($data as $d )
    <div class="row setup-content {{ $currentStep != 1 ? 'd-none' : '' }}" id="step-1">
        <div class="col-12">
            <div class="col-md-12">
                <h3 style="color:#d864b3;">Pemesanan Kamar Hotel {{ $d->produk->nama_produk }}</h3>
                <p><i data-feather="map-pin" style="width: 14px; height:14px"></i> Lokasi {{ $d->produk->deskripsi }}</p>
                <div class="mb-3">
                    <p>Tanggal Booking: {{ \Carbon\Carbon::parse($d->check_in)->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <label for="description" class="form-label">Jumlah Kamar:</label>
                    <input type="number" min="1" max="{{ $d->jumlah }}" wire:model="jumlah" class="form-control" id="productAmount"/>
                    @error('jumlah') <span style="color: #d864b3">{{ $message }}</span> @enderror
                    <div class="col-12 px-3 text-end" style="font-size: 10pt;color:#9fa6b2;"><i>Kamar Tersedia: {{ $d->jumlah }}</i></div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Durasi Menginap:</label>
                    <input type="number" min="1" max="7" wire:model="malam" class="form-control" id="productAmount"/>
                    @error('malam') <span style="color: #d864b3">{{ $message }}</span> @enderror
                    <div class="col-12 px-3 text-end" style="font-size: 10pt;color:#9fa6b2;"><i>Maksimal 7 malam</i></div>
                </div>
                <button class="btn4 btn btn-sm float-end" wire:click="firstStepSubmit" type="button">Selanjutnya</button>
                <button class="btn4 btn btn-sm float-end me-3" onclick="window.history.back();" type="button">Batal</button>
            </div>
        </div>
      </div>

      <div class="row setup-content {{ $currentStep != 2 ? 'd-none' : '' }}" id="step-2">
        <div class="col-12">
            <div class="col-md-12">
                <h3 style="color:#d864b3;">Lengkapi Data Diri Anda</h3>
                <div class="form-group">
                    <label for="description">Nama Lengkap: </label><br/>
                    <input type="text" wire:model="nama_pemesan" class="form-control" id="productAmount" value="{{ $nama_pemesan }}"/>
                    @error('nama_pemesan') <span style="color: #d864b3">{{ $message }}</span> @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="description">Nomor Telpon</label>
                    <input type="telp" wire:model="nomor_hp" class="form-control" id="productStock" required />
                    @error('nomor_hp') <span style="color: #d864b3">{{ $message }}</span> @enderror
                </div>
                <button class="btn4 btn btn-sm mt-3 float-end" type="button" wire:click="secondStepSubmit">Selanjutnya</button>
                <button class="btn4 btn btn-sm mt-3 float-end me-3" type="button" wire:click="back(1)">Kembali</button>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 3 ? 'd-none' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3 style="color:#d864b3;">Pastikan Pesanan Anda Benar</h3>
                <table class="table">
                    <tr>
                        <td>Pemesan:</td>
                        <td><strong>{{ $nama_pemesan }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nomor HP:</td>
                        <td><strong>{{ $nomor_hp }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Pesanan:</td>
                        <td><strong>Hotel {{ $d->produk->nama_produk }} ({{ $d->produk->deskripsi }})</strong> <br> <i class="far fa-calendar-check fa-xs"></i> {{ \Carbon\Carbon::parse($d->check_in)->translatedFormat('d F Y') }} --- <i class="far fa-moon"></i> {{ $malam }} malam</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan:</td>
                        <td><strong>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Kamar per malam:</td>
                        <td>Rp. {{ number_format($d->harga,2,',','.') }}</td>
                        <td>x{{ $jumlah }}</td>
                    </tr>
                    <tr>
                        <td>Total Harga:</td>
                        <td><strong>Rp. {{ number_format($d->harga*intval($malam)*intval($jumlah),2,',','.') }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran:</td>
                        <td><strong>{{ $status }}</strong></td>
                        <td></td>
                    </tr>
                </table>
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <button class="btn4 btn btn-sm btn-lg float-end" wire:click="submitForm" type="button">Bayar</button>
                <button class="btn4 btn btn-sm btn-lg float-end me-3" type="button" wire:click="back(2)">Kembali</button>
            </div>
        </div>
    </div>
    @endforeach

    </div>

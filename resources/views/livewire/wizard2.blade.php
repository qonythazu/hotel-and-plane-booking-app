{{-- @dd($data) --}}
<div>

    @if(!empty($successMessage))
    <div class="alert alert-success">
       {{ $successMessage }}
    </div>
    @endif

    <div class="d-flex text-center">
        <!-- progressbar -->
        <ul class="progressbar">
            <li class="{{ $currentStep > 1 ? 'complete' : '' }} {{ $currentStep != 1 ? '' : 'active' }}"><a href="#step-1" type="button" style="text-decoration: none;">Detail Perjalanan</a></li>
            <li class="{{ $currentStep > 2 ? 'complete' : '' }}{{ $currentStep != 2 ? '' : 'active' }}"><a href="#step-2" type="button" style="text-decoration: none;">Identitas</a></li>
            <li class="{{ $currentStep != 3 ? '' : 'complete active' }}"><a href="#step-3" type="button"  style="text-decoration: none;" disabled="disabled">Konfirmasi</a></li>
        </ul>
    </div>


    @foreach ($data as $d )
    <div class="row setup-content {{ $currentStep != 1 ? 'd-none' : '' }}" id="step-1">
        <div class="col-12">
            <div class="col-md-12">
                <h3 style="color:#d864b3;">Detail Perjalanan</h3>
                <div class="mb-3">
                    <p><strong>Keberangkatan:</strong> {{ \Carbon\Carbon::parse($d->tgl_pergi)->translatedFormat('l, d F Y') }}</p>
                </div>
                {{-- tabel --}}
                <table class="table bg-light table-custom text-center">
                    <thead>
                        <tr>
                        <th scope="col">Maskapai</th>
                        <th scope="col">Berangkat</th>
                        <th scope="col"></th>
                        <th scope="col">Tiba</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $berangkat = \Carbon\Carbon::parse($d->waktu_pergi);
                            $tiba = \Carbon\Carbon::parse($d->waktu_tiba);
                            $durasi = $berangkat->diffInMinutes($tiba);
                            $jam = intdiv($durasi, 60);
                            $menit = $durasi % 60;
                        @endphp
                        <tr>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span class="text-start fw-bold">{{ $d->produk->nama_produk }}</span>
                                <small class="fst-italic text-muted">{{ $d->produk->deskripsi }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($berangkat)->translatedFormat('H:i') }}</span>
                                <small>{{ $d->kota_asal }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span><i class="fas fa-plane"></i></span>
                                <small class="text-muted" style="font-size: 8pt">{{ $jam }}j {{ $menit }}mnt</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($tiba)->translatedFormat('H:i')}}</span>
                                <small>{{ $d->kota_tiba }}</small>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                    {{-- end --}}
                <div>
                    <label for="description" class="form-label">Jumlah Penumpang:</label>
                    <input type="number" min="1" max="{{ $d->jumlah }}" wire:model="jumlah" class="form-control" id="productAmount"/>
                    @error('jumlah') <span style="color: #d864b3">{{ $message }}</span> @enderror
                    <div class="col-12 px-3 mb-3 text-end" style="font-size: 10pt;color:#9fa6b2;"><i>Kursi Tersedia: {{ $d->jumlah }}</i></div>
                </div>
                <button class="btn4 btn btn-sm float-end" wire:click="firstStepSubmit" type="button">Selanjutnya</button>
                <button class="btn4 btn btn-sm float-end me-3" onclick="window.history.back();" type="button">Batal</button>
            </div>
        </div>
      </div>

      <div class="row setup-content {{ $currentStep != 2 ? 'd-none' : '' }}" id="step-2">
        <div class="col-12">
            <div class="col-md-12">
                <h3 style="color:#d864b3;">Data Pemesan</h3>
                <div class="form-group">
                    <label for="description">Nama Lengkap: </label><br/>
                    <input type="text" wire:model="nama_pemesan" class="form-control" id="productAmount" value="{{ $nama_pemesan }}" required/>
                    @error('nama_pemesan') <span style="color: #d864b3">{{ $message }}</span> @enderror
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="description">Nomor Telpon</label>
                    <input type="telp" wire:model="nomor_hp" class="form-control" id="productStock" required />
                    @error('nomor_hp') <span style="color: #d864b3">{{ $message }}</span> @enderror
                </div>
                <hr>
                @for ($i = 1; $i <= $jumlah; $i++)
                <h3 class="pt-3" style="color:#d864b3;">Data Penumpang {{ $i }}</h3>
                <div class="row g-3">
                    <div class="col-2">
                        <label for="description">Title</label>
                        <select class="form-select" aria-label="Default select example" wire:model="tittle.{{ $i }}" required>
                            <option> </option>
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Ms</option>
                        </select>
                        @error('tittle') <span style="color: #d864b3">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-10">
                        <label for="description">Nama Lengkap: </label><br/>
                        <input type="text" wire:model="nama_penumpang.{{ $i }}" class="form-control" id="productAmount" required/>
                        @error('nama_penumpang') <span style="color: #d864b3">{{ $message }}</span> @enderror
                    </div>
                  </div>
                @endfor
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
                        <td>Pesawat:</td>
                        <td><strong>{{ $d->produk->nama_produk }} (<i>{{ $d->produk->deskripsi }}</i>)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Rute:</td>
                        <td><strong>{{ $d->kota_asal }} <i class="fa-solid fa-arrow-right"></i> {{ $d->kota_tiba }}</strong></td>
                        <td></td>
                    </tr>
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
                        <td>Tanggal Pemesanan:</td>
                        <td><strong>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Harga Per orang:</td>
                        <td>Rp. {{ number_format($d->harga,2,',','.') }}</td>
                        <td>x{{ $jumlah }} orang</td>
                    </tr>
                    <tr>
                        <td>Total Harga:</td>
                        <td><strong>Rp. {{ number_format($d->harga*intval($jumlah),2,',','.') }}</strong></td>
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

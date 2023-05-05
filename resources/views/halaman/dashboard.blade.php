@extends('layout/app')

@section('content')
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5 bg-light rounded">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="h1 fw-light"><strong>Booking App</strong></h1>
        <p class="lead text-muted">web ini menyediakan layanan pemesanan tiket pesawat dan hotel secara daring dengan fokus perjalanan domestik di Kalimantan Timur</p>
        <p>
            @if(Auth::user()->role_id==2)
            <a href="/halaman_mitra" class="btn2 btn btn-outline-light">Let's Get Started</a>
            {{-- <button type="button" class="btn3 btn btn-sm mt-4">Booking Sekarang</button> --}}
            @elseif(Auth::user()->role_id==3)
            <a href="/booking_hotel" class="btn2 btn btn-outline-light">Let's Get Started</a>
            {{-- <button type="button" class="btn3 btn btn-sm mt-4">Booking Sekarang</button> --}}
            @endif
        </p>
      </div>
    </div>
  </section>

  <div class="album">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 ">
        <div class="col">
          <div class="card shadow-sm">
            <img src="img/plane.png" class="rounded-top" alt="" width="635px">
            <div class="card-body">
              <p class="card-text">Anda dapat dengan mudah memesan tiket pesawat melalui Booking App ini!. Tunggu apa lagi?</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="but btn-group">
                  @if(Auth::user()->role_id==2)
                  <a href="/halaman_mitra" class="btn3 btn btn-sm mt-4">List Produk</a>
                  {{-- <button type="button" class="btn3 btn btn-sm mt-4">Booking Sekarang</button> --}}
                  @elseif(Auth::user()->role_id==3)
                  <a href="/booking_pesawat" class="btn3 btn btn-sm mt-4">Booking Sekarang</a>
                  {{-- <button type="button" class="btn3 btn btn-sm mt-4">Booking Sekarang</button> --}}
                  @endif
                </div>
                <small class="text-muted mt-4"><i class="fas fa-plane-departure"></i></small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="img/hotel.png" class="rounded-top" alt="" width="635px">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <div class="card-body">
              <p class="card-text">Tidak hanya tiket pesawat. dengan Booking App anda juga bisa memesan kamar hotel secara praktis dan mudah</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="but btn-group">
                    @if(Auth::user()->role_id==2)
                    <a href="/halaman_mitra" class="btn3 btn btn-sm mt-4">List Produk</a>
                    {{-- <button type="button" class="btn3 btn btn-sm mt-4">Booking Sekarang</button> --}}
                    @elseif(Auth::user()->role_id==3)
                    <a href="/booking_hotel" class="btn3 btn btn-sm mt-4">Booking Sekarang</a>
                    {{-- <button type="button" class="btn3 btn btn-sm mt-4">Booking Sekarang</button> --}}
                    @endif
                </div>
                <small class="text-muted mt-4"><i class="fas fa-suitcase"></i></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="bg-light mt-5 py-3">
  <div class="container d-flex flex-row">
    <div class="col-md-6">
      <small class="d-block mb-3 text-muted">&copy; 2023</small>
    </div>
    <div class="col-md-2">
      <h5>Company</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="https://itk.ac.id/">Insitut Teknologi kalimantan</a></li>
        <li><a class="link-secondary" href="https://if.itk.ac.id/">Program Studi Informatika</a></li>
        <li><p class="text-secondary">Pengembangan Aplikasi Berbasis Web</p></li>
      </ul>
    </div>
    <div class="col-md-2">
      <h5>Product By</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="https://laravel.com/">Laravel 10</a></li>
        <li><a class="link-secondary" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a></li>
        <li><a class="link-secondary" href="https://www.mysql.com/">MySQL</a></li>
      </ul>
    </div>
    <div class="col-md-2">
      <h5>Contacts</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Destiera Fitryani</a></li>
        <li><a class="link-secondary" href="#">Nadhira Rizqana</a></li>
        <li><a class="link-secondary" href="#">Putri Oktatriani</a></li>
        <li><a class="link-secondary" href="#">Putri Qonita Arif</a></li>
        <li><a class="link-secondary" href="#">Shinta Adelia Wardani</a></li>
      </ul>
    </div>
  </div>
</footer>

@endsection

@extends('layout/app')

@section('content')
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5 bg-light">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><strong>Booking App</strong></h1>
        <p class="lead text-muted">web ini </p>
        <p>
          <a href="#" class="btn btn-primary my-2">let's get started</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 ">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">Anda dapat dengan mudah memesan tiket pesawat melalui Booking App ini!. Tunggu apa lagi?</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Booking Sekarang</button>
                </div>
                <small class="text-muted">pesawat</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">Tidak hanya tiket pesawat. dengan Booking App anda juga bisa memesan kamar hotel secara praktis dan mudah</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Booking Sekarang</button>
                </div>
                <small class="text-muted">hotel</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md-6">
        <small class="d-block mb-3 text-muted">&copy; 2023</small>
    </div>
    <div class="col-6 col-md">
      <h5>Company</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="https://itk.ac.id/">Insitut Teknologi kalimantan</a></li>
        <li><a class="link-secondary" href="https://if.itk.ac.id/">Program Studi Informatika</a></li>
        <li><p class="text-secondary">Pengembangan Aplikasi Berbasis Web</p></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Product By</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="https://laravel.com/">Laravel 10</a></li>
        <li><a class="link-secondary" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">Bootstrap 5</a></li>
        <li><a class="link-secondary" href="https://www.mysql.com/">MySQL</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
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
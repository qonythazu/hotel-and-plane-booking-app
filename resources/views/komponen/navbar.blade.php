<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text text-white" href="/dashboard"><h4>Booking App</h4></a>
        <form class="d-flex" role="search">
            @csrf
            @auth
                @if(Auth::user()->role_id==1)
                <a href="/dashboard_admin" class="btn btn-outline-light">Admin</a>
                @elseif(Auth::user()->role_id==3)
                {{-- <button class="btn btn-outline-light">{{Auth::user()->name}} | User</button> --}}
                <li class="nav-item dropdown btn btn-outline-light">
                    <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}} | User
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/pesanan_saya">Pesanan Saya</a></li>
                    </ul>
                  </li>
                @else
                <button class="btn btn-outline-light">{{Auth::user()->name}} | Mitra</button>
                @endif
            @endauth
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/sesi/logout" class="nav-link text-white">Logout</a>
                </li>
            </ul>
        </form>
    </div>
</nav>

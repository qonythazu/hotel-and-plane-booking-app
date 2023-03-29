<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text text-white" href="#"><h4>Booking App</h4></a>
        <form class="d-flex" role="search">
            @csrf
            @auth
                @if(Auth::user()->role_id==1)
                <button class="btn btn-outline-light">Admin</button>
                @elseif(Auth::user()->role_id==2)
                <button class="btn btn-outline-light">{{Auth::user()->name}} | User</button>
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

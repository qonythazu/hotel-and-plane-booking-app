<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text text-white" href="#"><h4>Booking App</h4></a>
        
        <form class="d-flex" role="search">
            @auth
              <button class="btn btn-outline-light">{{Auth::user()->name}}</button>
            @endauth
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/sesi/logout" class="nav-link text-white">Logout</a>
                </li>
            </ul>
        </form>
    </div>
</nav>
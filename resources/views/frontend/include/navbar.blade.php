<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="{{ asset('assets/image/logo.png') }}" width="70" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-5 mb-lg-0">
        @guest
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/register') }}">Register</a>
          </li>
        @endguest
        @auth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <?php
              $cart_utama = \App\Models\Cart::where('user_id', Auth::user()->id)->where('status',0)->first();
              if(!empty($cart_utama))
              {
                $notif = \App\Models\Transaction::where('cart_id', $cart_utama->id)->count(); 
              }
            ?>
            <a class="nav-link" href="{{ url('check-out') }}">
                <i class="fa fa-shopping-cart"></i>
                @if(!empty($notif))
                  <span class="badge badge-danger">{{ $notif }}</span>
                @endif
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}
            </a>
            @if (auth()->user()->level=="admin")
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                <li><a class="dropdown-item" href="{{ url('/category') }}">Category</a></li>
                {{-- <li><hr class="dropdown-divider"></li> --}}
              </ul>
            @else
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                <li><a class="dropdown-item" href="{{ url('/profile') }}">Profil</a></li>
                <li><a class="dropdown-item" href="{{ url('/history') }}">Riwayat Pesanan</a></li>
              </ul>
            @endif
          </li>
        @endauth
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
</nav>

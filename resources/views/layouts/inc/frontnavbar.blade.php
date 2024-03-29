<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Online shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto" >
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">categories</a>
          </li>
          <li class="nav-item">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" >Home</a>
                @else
                    <a href="{{ route('login') }}" >Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" >Register</a>
                    @endif
                @endauth
        @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
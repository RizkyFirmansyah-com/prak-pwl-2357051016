<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="{{ url('/') }}">UserApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nvb" aria-controls="nvb" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nvb">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        {{-- Link ke List User --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" 
             href="{{ route('user.create') }}">
            List User
          </a>
        </li>

        {{-- Link ke Form Tambah User --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->is('user/create') ? 'active' : '' }}" 
             href="{{ route('user.create') }}">
            Form User
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="{{ url('/') }}">UserApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nvb">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nvb">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('users')?'active':'' }}" href="{{ route('user.index') }}">List User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('users/create')?'active':'' }}" href="{{ route('user.create') }}">Form User</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

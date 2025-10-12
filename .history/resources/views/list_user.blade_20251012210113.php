  @extends('layouts.app')
  @section('title','List User')

  @section('content')
    {{-- Flash message --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Header + Aksi --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
      <h4 class="mb-0">Daftar Pengguna</h4>
      <div class="d-flex gap-2">
        <form method="GET" class="d-flex" role="search">
          <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama / NIM / email">
        </form>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
      </div>
    </div>

    {{-- Ringkasan kecil --}}
    <div class="row g-3 mb-3">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="small text-muted">Total User</div>
            <div class="display-6">
              {{ method_exists($users,'total') ? $users->total() : (is_countable($users) ? count($users) : 0) }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="small text-muted">Terakhir diperbarui: {{ now()->format('d M Y H:i') }}</span>
            <div class="d-flex gap-2">
              <a class="btn btn-outline-secondary disabled">Export</a>
              <a class="btn btn-outline-secondary disabled">Filter</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Tabel --}}
    <div class="card border-0 shadow-sm">
      <div class="card-body table-responsive">
        <table class="table align-middle table-hover">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Kelas</th>
              <th>Dibuat</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama ?? $user->name ?? '-' }}</td>
                <td>{{ $user->nim ?? '-' }}</td>
                <td>{{ $user->nama_kelas ?? ($user->kelas->nama_kelas ?? '-') }}</td>
                <td>{{ optional($user->created_at)->diffForHumans() }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-muted">Tidak ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>

        @if(method_exists($users, 'links'))
          <div class="mt-2">
            {{ $users->links() }}
          </div>
        @endif
      </div>
    </div>
  @endsection

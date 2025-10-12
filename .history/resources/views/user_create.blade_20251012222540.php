@extends('layouts.app')
@section('title','Buat Pengguna Baru')

@section('content')
<div class="container">
  <h1 class="mb-4">Buat Pengguna Baru</h1>

  {{-- Notifikasi error validasi --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('user.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" id="nama" name="nama" class="form-control"
             value="{{ old('nama') }}" required>
    </div>

    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" id="nim" name="nim" class="form-control"
             value="{{ old('nim') }}" required>
    </div>

    <div class="mb-3">
      <label for="kelas_id" class="form-label">Kelas</label>
      <select name="kelas_id" id="kelas_id" class="form-select" required>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection

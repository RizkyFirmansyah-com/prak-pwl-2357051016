@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="container">
  <h1 class="mb-4">Edit Data User</h1>

  {{-- Notifikasi Error --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Form Edit --}}
  <form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" id="nama" 
             class="form-control" value="{{ old('nama', $user->nama) }}" required>
    </div>

    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" name="nim" id="nim" 
             class="form-control" value="{{ old('nim', $user->nim) }}" required>
    </div>

    <div class="mb-3">
      <label for="kelas_id" class="form-label">Kelas</label>
      <select name="kelas_id" id="kelas_id" class="form-select" required>
        @foreach ($kelas as $k)
          <option value="{{ $k->id }}" {{ $k->id == $user->kelas_id ? 'selected' : '' }}>
            {{ $k->nama_kelas }}
          </option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection

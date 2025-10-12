@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('matakuliah.create') }}">Tambah Mata Kuliah Baru</a>
    <br><br>

    <table cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nama Mata Kuliah</td>
                <td>SKS</td>
            </tr>
        </thead>
<tbody>
    @foreach ($mks as $mk)
        <tr>
            <td>{{ $mk->id }}</td>
            <td>{{ $mk->nama_mk }}</td>
            <td>{{ $mk->sks }}</td>
            <td>
                <a href="{{ route('matakuliah.edit', $mk->id) }}">Edit</a> |
                <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection

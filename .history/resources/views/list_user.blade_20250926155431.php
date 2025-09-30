
@extends(view : 'layouts.app')


@section('content')

    <h1>Daftar Pengguna</h1>
    <table>
    <thead>
        <tr>
            <td>ID</td>
            <td>NAMA</td>
            <td>NIM</td>
            <td>KELAS</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nim }}</td>
                <td>{{ $user->nama_kelas }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

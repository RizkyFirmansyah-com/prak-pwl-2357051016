<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    private UserModel $userModel;
    private Kelas $kelasModel;

    public function __construct()
    {
        $this->userModel  = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // LIST
    public function index()
    {
        // Jika UserModel punya method getUser(), pakai itu.
        // Kalau tidak, bisa ganti: $users = UserModel::with('kelas')->orderBy('nama')->get();
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];
        return view('list_user', $data);
    }

    // CREATE FORM
    public function create()
    {
        $data = [
            'title' => 'Create User',
            'kelas' => $this->kelasModel->getKelas(), // pastikan nama method-nya getKelas()
        ];
        return view('user_create', $data);
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => ['required','string','max:100'],
            'nim'      => ['required','string','max:20'],
            'kelas_id' => ['required','exists:kelas,id'],
        ]);

        $this->userModel->create($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // EDIT FORM
    public function edit(string $id)
    {
        $user  = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        return view('user_edit', [
            'title' => 'Edit User',
            'user'  => $user,
            'kelas' => $kelas,
        ]);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama'     => ['required','string','max:100'],
            'nim'      => ['required','string','max:20'],
            'kelas_id' => ['required','exists:kelas,id'],
        ]);

        $user = UserModel::findOrFail($id);
        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    // DELETE
    public function destroy(string $id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
{
    $data = [
        'title' => 'List User',
        'users' => $this->userModel->getUser()
    ];

    return view('list_user', $data);
}

    
    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getkelas();
        $data =[
            'title'=>'Create User',
            'kelas'=>$kelas
        ];

        return view('user_create', $data);
    }
    public function store(Request $request){
    $this->userModel->create([
        'nama'    => $request->input('nama'),
        'nim'     => $request->input('nim'),
        'kelas_id'=> $request->input('kelas_id'),
    ]);

    return redirect()->to('/user');
}

public function index()
{
    $q = request('q');

    $users = \DB::table('user') // ganti jadi 'users' kalau tabel jamak
        ->leftJoin('kelas', 'kelas.id', '=', 'user.kelas_id')
        ->select('user.*', 'kelas.nama_kelas')
        ->when($q, function($s) use ($q) {
            $s->where(function($w) use ($q) {
                $w->where('user.nama','like',"%$q%")
                  ->orWhere('user.nim','like',"%$q%")
                  ->orWhere('user.email','like',"%$q%");
            });
        })
        ->orderByDesc('user.id')
        ->paginate(10)->withQueryString();

    // Tambahkan atribut untuk komponen tabel
    $users->getCollection()->transform(function($u){
        $u->_nama = $u->nama ?? $u->name ?? '-';
        $u->_nim = $u->nim ?? '-';
        $u->_kelas = $u->nama_kelas ?? '-';
        $u->created_at_human = optional($u->created_at)->diffForHumans();
        return $u;
    });

    return view('layouts.list_user', compact('users'));
}


}

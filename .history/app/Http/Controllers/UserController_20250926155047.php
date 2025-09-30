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

        return view('user.create', $data);
    }
    public function store(Request $request){
    $this->userModel->create([
        'nama'    => $request->input('nama'),
        'nim'     => $request->input('nim'),
        'kelas_id'=> $request->input('kelas_id'),
    ]);

    return redirect()->to('/user');
}

}

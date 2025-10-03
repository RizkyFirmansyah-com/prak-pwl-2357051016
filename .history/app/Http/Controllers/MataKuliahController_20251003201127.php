<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Mata Kuliah',
            'mks'   => Matakuliah::all(),
    ];
    return view('list_mk', $data);

    
    }
    public function create()
{
    return view('create_mk', ['title' => 'Create Mata Kuliah']);
}

}

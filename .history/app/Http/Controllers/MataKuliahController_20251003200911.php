<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahModel = new MataKuliah();
        $mataKuliah = $mataKuliahModel->getAllMK();

        return view('mata_kuliah.index', compact('mataKuliah'));
    }
}

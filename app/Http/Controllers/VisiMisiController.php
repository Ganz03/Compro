<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Menampilkan data visi & misi
     */
    public function index()
    {
        $visiMisi = VisiMisi::first(); // Ambil data pertama
        return $visiMisi;
    }
}
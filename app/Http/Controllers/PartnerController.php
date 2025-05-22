<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Menampilkan halaman mitra
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partners = Partner::all();  // Ambil semua data mitra

        return $partners;  // Kirim data mitra ke view
    }
}
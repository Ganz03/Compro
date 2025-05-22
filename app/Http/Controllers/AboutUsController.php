<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Menampilkan halaman utama (landing page) yang berisi data About Us.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Ambil data "About Us" pertama dari database
        $aboutUs = AboutUs::first();

        // Kirim data ke view
        return $aboutUs;
    }
}
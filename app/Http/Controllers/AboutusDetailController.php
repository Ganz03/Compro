<?php

namespace App\Http\Controllers;
use App\Models\AboutUsDetail;

use Illuminate\Http\Request;

class AboutusDetailController extends Controller
{
     public function index()
    {
        // Ambil data first About Us Detail
        $aboutUsDetail = AboutUsDetail::first();

        // Kirim data ke view
        return view('aboutus', compact('aboutUsDetail'));
    }
}

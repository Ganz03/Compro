<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HeroSectionController extends Controller
{
    /**
     * Menampilkan Hero Section
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil Hero Section pertama atau buat satu record jika tidak ada
        $heroSection = HeroSection::firstOrCreate([
            'id' => 1, // Pastikan hanya ada satu record dengan ID 1
        ]);

        // Pass data heroSection ke view
        return $heroSection;
    }
}

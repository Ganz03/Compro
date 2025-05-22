<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function show()
    {
        $career = Career::first(); // Ambil data pertama dari Career

        return view('career', compact('career')); // Kirim data ke view 'career'
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Spbu;
use App\Models\Team;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SpbuController extends Controller
{
    /**
     * Display the specified SPBU page.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Gunakan raw query untuk bypass cache Eloquent
        $spbuData = DB::select('SELECT * FROM spbus WHERE slug = ? LIMIT 1', [$slug]);
        
        if (empty($spbuData)) {
            abort(404, 'SPBU dengan slug "' . $slug . '" tidak ditemukan.');
        }
        
        // Convert to object
        $spbu = (object)$spbuData[0];
        
        // Ambil data team untuk SPBU ini
        $teams = Team::where('spbu_id', $spbu->id)
                    ->where('is_active', true)
                    ->orderBy('order')
                    ->get();
        
        // Ambil data facilities untuk SPBU ini
        $facilities = Facility::where('spbu_id', $spbu->id)
                            ->where('is_active', true)
                            ->orderBy('order')
                            ->get();
        
        // PERHATIKAN DI SINI: Ambil semua SPBU untuk navigasi dan beri nama navigationSpbus
        $navigationSpbus = Spbu::where('is_active', true)
                            ->orderBy('established_year', 'asc')
                            ->get();
        
        // Ambil semua SPBU untuk footer (jika diperlukan)
        $allSpbus = Spbu::where('is_active', true)
                        ->orderBy('name')
                        ->get();
        
        // Pertahankan variabel spbus untuk backward compatibility
        $spbus = $navigationSpbus;
        
        // Return view dengan semua variabel
        return view('spbu.show', compact(
            'spbu', 
            'teams', 
            'facilities', 
            'navigationSpbus', // Variabel baru untuk navigasi
            'spbus',           // Variabel lama untuk backward compatibility
            'allSpbus'         // Untuk penggunaan lain
        ));
    }
}
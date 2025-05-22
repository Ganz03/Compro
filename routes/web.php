<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutusDetailController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpbuController;
use App\Models\Spbu;
use App\Models\Team;
use App\Models\Facility;


Route::get('/', function () {
    // Ambil data SPBU
    $spbus = spbu::where('is_active', true)
        ->orderBy('established_year', 'asc') // Oldest first
        ->get();

    // Define accent colors for each position
    $accentColors = [
        'rgb(38, 198, 249)', // Blue for first position
        'rgb(153, 172, 48)', // Green/Yellow for second position
        'rgb(186, 49, 59)',  // Red for third position
        'rgb(223, 223, 227)' // Light gray for fourth position
    ];

    // Organize SPBUs into layout groups
    $layoutGroups = (new HomeController)->organizeSpbusIntoLayoutGroups($spbus, $accentColors);

    // Ambil data lainnya untuk landing page
    $heroSection = (new HeroSectionController)->index();
    $aboutUs = (new AboutUsController)->show();
    $visiMisi = (new VisiMisiController)->index();
    $partners = (new PartnerController)->index();

    // Ambil berita terbaru 3 item untuk landing page
    $news = NewsController::getLatestNews(3);

    return view('landingpage', compact('spbus', 'layoutGroups', 'heroSection', 'aboutUs', 'visiMisi', 'partners', 'news'));
});
Route::get('/career', [CareerController::class, 'show'])->name('career');
Route::get('/aboutus', [AboutusDetailController::class, 'index'])->name('aboutus');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/spbu/{slug?}', [SpbuController::class, 'show'])->name('spbu.show');

// Define other routes for non-authenticated users
Route::get('/contact', function () {
    return view('contact');
})->name('contact');



<?php
namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan semua berita
     */
    public function index(Request $request)
    {
        $news = News::with('categories')
            ->published()
            ->when($request->category, function($query) use ($request) {
                return $query->whereHas('categories', function($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            })
            ->when($request->search, function($query) use ($request) {
                return $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            })
            ->paginate(9);
            
        $categories = NewsCategory::withCount(['news' => function ($query) {
            $query->published();
        }])->orderBy('news_count', 'desc')->get();
        
        return view('news.index', compact('news', 'categories'));
    }

    /**
     * Menampilkan detail berita berdasarkan slug
     */
    public function show($slug)
    {
        $news = News::with('categories')
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();
            
        // Berita terkait dari kategori yang sama
        $relatedNews = News::with('categories')
            ->published()
            ->whereHas('categories', function($query) use ($news) {
                $query->whereIn('news_categories.id', $news->categories->pluck('id'));
            })
            ->where('id', '!=', $news->id)
            ->limit(3)
            ->get();
            
        return view('news.show', compact('news', 'relatedNews'));
    }

    public static function getLatestNews($limit = 3)
    {
        return News::with('categories')
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
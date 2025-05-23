@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <h1 class="text-center text-3xl font-bold mb-8">Berita Kami</h1>
        
        <!-- Search Bar -->
        <section class="mb-8">
            <div class="max-w-3xl mx-auto px-4">
                <form action="{{ route('news.index') }}" method="GET">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request()->search }}" 
                               class="w-full py-3 px-4 pr-12 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               placeholder="Cari berita...">
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Filter kategori -->
        @if($categories->count() > 0)
        <section class="mb-8">
            <div class="flex flex-wrap justify-center gap-2 px-4">
                <a href="{{ route('news.index') }}" 
                   class="px-4 py-2 rounded-full {{ !request()->has('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('news.index', ['category' => $category->slug]) }}" 
                       class="px-4 py-2 rounded-full {{ request('category') == $category->slug ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        {{ $category->name }}
                    </a>
                    @endforeach
            </div>
        </section>
        @endif

        <!-- News Grid -->
        <section class="article-list mb-12">
            @if($news->count() > 0)
                <div class="row">
                    @foreach($news as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-full overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                                <a href="{{ route('news.show', $item->slug) }}" class="block overflow-hidden">
                                    @if($item->featured_image)
                                        <img src="{{ asset('images/news/' . $item->featured_image) }}" 
                                             alt="{{ $item->title }}" 
                                             class="card-img-top h-48 w-full object-cover transition-transform duration-500 hover:scale-110">
                                    @else
                                        <img src="https://via.placeholder.com/400x250?text=No+Image" 
                                             class="card-img-top h-48 w-full object-cover transition-transform duration-500 hover:scale-110" 
                                             alt="Placeholder">
                                    @endif
                                </a>
                                <div class="card-body p-4">
                                    <div class="flex flex-wrap gap-1 mb-2">
                                        @foreach($item->categories as $category)
                                            <span class="bg-gray-100 text-xs px-2 py-1 rounded-full">
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                    
                                    <h5 class="card-title text-lg font-semibold mb-2 line-clamp-2">
                                        <a href="{{ route('news.show', $item->slug) }}" class="hover:text-blue-600">
                                            {{ $item->title }}
                                        </a>
                                    </h5>
                                    
                                    <p class="card-text text-sm text-gray-500 mb-3">
                                        Artikel / {{ $item->published_at->format('d M Y') }}
                                    </p>
                                    
                                    <a href="{{ route('news.show', $item->slug) }}" class="text-blue-600 hover:text-blue-800 inline-block mt-2">
                                        Baca selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-8 flex justify-center">
                    {{ $news->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-12 px-4">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-xl font-medium text-gray-700 mb-2">Tidak ada berita ditemukan</h3>
                    <p class="text-gray-500 mb-6">
                        @if(request()->has('search'))
                            Tidak ada hasil yang cocok dengan pencarian "{{ request()->search }}".
                        @elseif(request()->has('category'))
                            Tidak ada berita dalam kategori ini saat ini.
                        @else
                            Belum ada berita yang dipublikasikan. Silakan kembali lagi nanti.
                        @endif
                    </p>
                    <a href="{{ route('news.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Kembali ke semua berita
                    </a>
                </div>
            @endif
        </section>
    </div>
</main>
@endsection

@push('styles')
<style>
    /* Card hover animation */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px); /* Lift the card */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Add shadow for the lifted effect */
    }
    
    /* Line clamp untuk membatasi judul berita ke 2 baris */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        line-clamp: 2;          /* Add the standard property for compatibility */
        overflow: hidden;
    }
</style>
@endpush
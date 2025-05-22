@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5 news-page">
        <div class="article-content">
            <!-- Breadcrumb -->
            <nav class="flex py-3 text-gray-700 bg-gray-50 rounded-lg px-5 mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="text-sm text-gray-700 hover:text-blue-600">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{ route('news.index') }}" class="ml-1 text-sm text-gray-700 hover:text-blue-600 md:ml-2">Berita</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm text-gray-500 md:ml-2">{{ $news->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="row">
                <!-- Main Content Column -->
                <div class="col-lg-8">
                    <!-- Featured Image -->
                    @if($news->featured_image)
                        <img src="{{ asset('images/news/' . $news->featured_image) }}" class="w-100 rounded" alt="{{ $news->title }}">
                    @else
                        <img src="https://via.placeholder.com/1200x600" class="w-100 rounded" alt="{{ $news->title }}">
                    @endif

                    <!-- Article Header -->
                    <div class="mt-4">
                        <!-- Categories -->
                        <div class="flex flex-wrap gap-2 mb-2">
                            @foreach($news->categories as $category)
                                <a href="{{ route('news.index', ['category' => $category->slug]) }}" 
                                   class="text-sm bg-gray-100 px-3 py-1 rounded-full hover:bg-gray-200">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>

                        <h2 class="text-3xl font-bold">{{ $news->title }}</h2>
                        <p class="card-text text-gray-500 mt-2">
                            Artikel / {{ $news->published_at->format('d M Y') }}
                            @if($news->author)
                                <span class="ml-2 border-l border-gray-300 pl-2">Oleh: {{ $news->author }}</span>
                            @endif
                        </p>
                    </div>

                    <!-- Article Short Description -->
                    @if($news->short_description)
                        <div class="mt-4 bg-gray-50 p-4 rounded-lg border-l-4 border-blue-500 italic">
                            {{ $news->short_description }}
                        </div>
                    @endif

                    <!-- Article Content -->
                    <div class="mt-4 prose prose-lg max-w-none">
                        {!! $news->content !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <h4 class="text-lg font-semibold mb-2">Bagikan</h4>
                        <div class="flex space-x-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank"
                               class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 inline-flex items-center">
                                <i class="fab fa-facebook-f mr-2"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}" 
                               target="_blank"
                               class="px-3 py-2 bg-blue-400 text-white rounded hover:bg-blue-500 inline-flex items-center">
                                <i class="fab fa-twitter mr-2"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . url()->current()) }}" 
                               target="_blank"
                               class="px-3 py-2 bg-green-500 text-white rounded hover:bg-green-600 inline-flex items-center">
                                <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Recent News Widget -->
                    <div class="bg-white rounded-lg shadow p-4 mb-5">
                        <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Berita Terbaru</h3>
                        <div class="space-y-4">
                            @foreach(App\Models\News::published()->where('id', '!=', $news->id)->latest('published_at')->limit(5)->get() as $recent)
                                <div class="flex space-x-3">
                                    @if($recent->featured_image)
                                        <a href="{{ route('news.show', $recent->slug) }}" class="flex-shrink-0">
                                            <img src="{{ asset('images/news/' . $recent->featured_image) }}" 
                                                 alt="{{ $recent->title }}" 
                                                 class="w-20 h-16 object-cover rounded">
                                        </a>
                                    @else
                                        <a href="{{ route('news.show', $recent->slug) }}" class="flex-shrink-0">
                                            <div class="w-20 h-16 bg-gray-200 rounded flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    @endif
                                    <div>
                                        <h4 class="text-sm font-medium line-clamp-2">
                                            <a href="{{ route('news.show', $recent->slug) }}" class="hover:text-blue-600">
                                                {{ $recent->title }}
                                            </a>
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $recent->published_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="bg-white rounded-lg shadow p-4 mb-5">
                        <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Kategori</h3>
                        <ul class="space-y-2">
                            @foreach(App\Models\NewsCategory::withCount(['news' => function ($query) {
                                $query->published();
                            }])->having('news_count', '>', 0)->orderBy('name')->get() as $category)
                                <li>
                                    <a href="{{ route('news.index', ['category' => $category->slug]) }}" 
                                       class="flex justify-between items-center py-2 hover:bg-gray-50 px-2 rounded {{ $news->categories->contains($category) ? 'text-blue-600 font-medium' : '' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">
                                            {{ $category->news_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Related News Widget -->
                    @if($relatedNews->count() > 0)
                        <div class="bg-white rounded-lg shadow p-4">
                            <h3 class="font-semibold text-lg mb-4 pb-2 border-b">Berita Terkait</h3>
                            <div class="space-y-4">
                                @foreach($relatedNews as $related)
                                    <div class="mb-4">
                                        <a href="{{ route('news.show', $related->slug) }}" class="block mb-2">
                                            @if($related->featured_image)
                                                <img src="{{ asset('images/news/' . $related->featured_image) }}" 
                                                     alt="{{ $related->title }}" 
                                                     class="w-full h-40 object-cover rounded">
                                            @else
                                                <div class="w-full h-40 bg-gray-200 rounded flex items-center justify-center">
                                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </a>
                                        <h4 class="text-base font-medium mb-1">
                                            <a href="{{ route('news.show', $related->slug) }}" class="hover:text-blue-600 line-clamp-2">
                                                {{ $related->title }}
                                            </a>
                                        </h4>
                                        <p class="text-sm text-gray-500">
                                            {{ $related->published_at->format('d M Y') }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        line-clamp: 2;          /* Add the standard property for compatibility */
        overflow: hidden;
    }
    
    /* Content styling */
    .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .prose p {
        margin-bottom: 1rem;
        line-height: 1.7;
    }
    
    .prose ul, .prose ol {
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }
    
    .prose li {
        margin-bottom: 0.5rem;
    }
    
    .prose a {
        color: #2563eb;
        text-decoration: underline;
    }
    
    .prose blockquote {
        border-left: 4px solid #e5e7eb;
        padding-left: 1rem;
        font-style: italic;
    }
    
    .prose img {
        margin: 1.5rem 0;
        border-radius: 0.375rem;
        max-width: 100%;
        height: auto;
    }
</style>
@endpush
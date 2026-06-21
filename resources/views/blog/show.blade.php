@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt)

@section('content')

{{-- Article Hero --}}
<section class="py-16 bg-gold-light relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-gold-dark hover:text-gold font-semibold text-sm mb-8 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Blog
        </a>
        @php
            $categoryColors = [
                'Case Study'  => 'bg-blue-100 text-blue-700',
                'Technology'  => 'bg-purple-100 text-purple-700',
                'Development' => 'bg-green-100 text-green-700',
                'Design'      => 'bg-pink-100 text-pink-700',
            ];
            $catClass = $categoryColors[$post->category] ?? 'bg-gold-light text-gold-dark';
        @endphp
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-5">
                <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $catClass }}">{{ $post->category }}</span>
                <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 leading-tight mb-6">{{ $post->title }}</h1>
            <p class="text-xl text-gray-600 leading-relaxed">{{ $post->excerpt }}</p>
            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gold/20">
                <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center">
                    <span class="text-white font-bold">{{ substr($post->author, 0, 1) }}</span>
                </div>
                <div>
                    <div class="font-semibold text-gray-900 text-sm">{{ $post->author }}</div>
                    <div class="text-gray-500 text-xs">GoldenCreeper Team</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Article Body --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Main Content --}}
            <article class="lg:col-span-2">
                <div class="prose prose-lg max-w-none prose-headings:font-black prose-headings:text-gray-900 prose-p:text-gray-600 prose-p:leading-relaxed prose-a:text-gold prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900">
                    {!! $post->content !!}
                </div>

                {{-- Share --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <div class="flex items-center gap-4 flex-wrap">
                        <span class="font-semibold text-gray-900 text-sm">Share this article:</span>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gold hover:text-white text-gray-700 font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.732-8.843L2.25 2.25h6.919l4.261 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gold hover:text-white text-gray-700 font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            LinkedIn
                        </a>
                    </div>
                </div>
            </article>

            {{-- Sidebar --}}
            <aside class="space-y-8">
                {{-- Author card --}}
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wide">About the Author</h3>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-12 h-12 rounded-full bg-gold flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-lg">{{ substr($post->author, 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">{{ $post->author }}</div>
                            <div class="text-xs text-gray-500">GoldenCreeper Team</div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">A member of the GoldenCreeper team, sharing insights on software development, technology strategy, and digital innovation.</p>
                </div>

                {{-- Recent Posts --}}
                @if($recent->isNotEmpty())
                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-5 text-sm uppercase tracking-wide">Recent Articles</h3>
                    <div class="space-y-5">
                        @foreach($recent as $recentPost)
                        <div class="group">
                            <span class="text-xs font-bold text-gold">{{ $recentPost->category }}</span>
                            <a href="{{ route('blog.show', $recentPost->slug) }}" class="block font-semibold text-gray-900 text-sm mt-1 leading-snug group-hover:text-gold transition-colors line-clamp-2">{{ $recentPost->title }}</a>
                            <span class="text-xs text-gray-400 mt-1 block">{{ \Carbon\Carbon::parse($recentPost->published_at)->format('M j, Y') }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- CTA Card --}}
                <div class="bg-gold rounded-2xl p-6 text-white text-center">
                    <h3 class="font-bold text-lg mb-2">Work with Us</h3>
                    <p class="text-white/80 text-sm mb-5">Ready to build something great? Let's talk about your project.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white text-gold-dark font-bold px-5 py-2.5 rounded-xl hover:bg-gray-50 transition-colors text-sm">
                        Get in Touch
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection

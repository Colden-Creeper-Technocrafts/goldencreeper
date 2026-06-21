@extends('layouts.app')

@section('title', 'Blog & Insights')
@section('meta_description', 'Read the latest articles on software development, technology trends, UI/UX design, and business strategy from the GoldenCreeper team.')

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-3xl">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Insights & Ideas</span>
            <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-6">The GoldenCreeper Blog</h1>
            <p class="text-xl text-gray-600 leading-relaxed">Practical insights on software development, digital strategy, and technology from our team of engineers, designers, and strategists.</p>
        </div>
    </div>
</section>

{{-- Posts Grid --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->isEmpty())
        <div class="text-center py-20 text-gray-500">
            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="text-lg font-medium">No posts yet. Check back soon!</p>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $i => $post)
            @php
                $categoryColors = [
                    'Case Study'  => 'bg-blue-100 text-blue-700',
                    'Technology'  => 'bg-purple-100 text-purple-700',
                    'Development' => 'bg-green-100 text-green-700',
                    'Design'      => 'bg-pink-100 text-pink-700',
                ];
                $catClass = $categoryColors[$post->category] ?? 'bg-gold-light text-gold-dark';
            @endphp
            <article class="group bg-white rounded-2xl border border-gray-100 hover:border-gold/30 shadow-sm hover:shadow-xl overflow-hidden transition-all duration-300 hover:-translate-y-1 flex flex-col">
                <div class="h-48 flex items-center justify-center relative overflow-hidden" style="background: linear-gradient(135deg, #C9A84C{{ sprintf('%02x', 30 + ($i * 20)) }}, #A68A3A{{ sprintf('%02x', 50 + ($i * 15)) }});">
                    <div class="text-center text-white/30 text-8xl font-black select-none">{{ substr($post->category, 0, 1) }}</div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>
                <div class="p-7 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $catClass }}">{{ $post->category }}</span>
                        <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($post->published_at)->format('M j, Y') }}</span>
                    </div>
                    <h2 class="font-bold text-gray-900 text-lg mb-3 group-hover:text-gold transition-colors leading-snug flex-1">{{ $post->title }}</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ \Illuminate\Support\Str::limit($post->excerpt, 150) }}</p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-gold flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-xs">{{ substr($post->author, 0, 1) }}</span>
                            </div>
                            <span class="text-xs text-gray-600 font-medium">{{ $post->author }}</span>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-1 text-gold font-semibold text-sm group-hover:gap-2 transition-all">
                            Read More
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- Newsletter CTA --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-5">Want Expert Insights in Your Inbox?</h2>
        <p class="text-white/80 text-lg mb-10">Follow our blog for practical software development, design, and business technology insights delivered regularly.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-xl hover:-translate-y-0.5">
            Get in Touch
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

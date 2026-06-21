@extends('layouts.app')

@section('title', '404 — Page Not Found')

@section('content')

<section class="min-h-screen bg-white flex items-center justify-center py-24">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        {{-- Large 404 --}}
        <div class="text-[160px] sm:text-[200px] font-black text-gold leading-none select-none mb-4" style="opacity: 0.15;">404</div>

        <div class="-mt-16 sm:-mt-20 relative z-10">
            <div class="w-20 h-20 bg-gold-light rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <h1 class="text-3xl sm:text-4xl font-black text-gray-900 mb-4">Page Not Found</h1>
            <p class="text-lg text-gray-600 leading-relaxed mb-10 max-w-md mx-auto">
                Sorry, we couldn't find the page you're looking for. It may have been moved, renamed, or might never have existed.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 bg-gold hover:bg-gold-dark text-white font-bold px-8 py-4 rounded-xl transition-all duration-200 shadow-lg hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Go Back Home
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 border-2 border-gold text-gold hover:bg-gold hover:text-white font-semibold px-8 py-4 rounded-xl transition-all duration-200">
                    Contact Us
                </a>
            </div>

            <div class="mt-16 pt-10 border-t border-gray-100">
                <p class="text-sm text-gray-500 mb-6">Or try one of these popular pages:</p>
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach([
                        ['About','about'],
                        ['Services','services.index'],
                        ['Portfolio','portfolio.index'],
                        ['Blog','blog.index'],
                        ['Careers','careers'],
                        ['FAQ','faq'],
                    ] as $link)
                    <a href="{{ route($link[1]) }}" class="text-sm font-semibold text-gray-600 hover:text-gold bg-gray-50 hover:bg-gold-light px-4 py-2 rounded-lg transition-colors">
                        {{ $link[0] }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

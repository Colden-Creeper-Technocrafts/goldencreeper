@extends('layouts.app')

@section('title', 'Our Portfolio')
@section('meta_description', 'Browse GoldenCreeper\'s portfolio of successful software projects across e-commerce, healthcare, education, real estate, finance, and more.')

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-3xl">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Our Work</span>
            <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-6">Projects That Delivered Results</h1>
            <p class="text-xl text-gray-600 leading-relaxed">From startups to enterprise — a selection of the work we're most proud of and the impact it created for our clients.</p>
        </div>
    </div>
</section>

{{-- Projects Grid --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $i => $project)
            @php
                $gradients = [
                    'linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%)',
                    'linear-gradient(135deg, #1e3a5f 0%, #2d5f8a 100%)',
                    'linear-gradient(135deg, #1a3a2a 0%, #2d6a4f 100%)',
                    'linear-gradient(135deg, #3a1a2a 0%, #6a2d4f 100%)',
                    'linear-gradient(135deg, #1a2a3a 0%, #2d4f6a 100%)',
                    'linear-gradient(135deg, #2a1a3a 0%, #4f2d6a 100%)',
                ];
                $gradient = $gradients[$i % count($gradients)];
            @endphp
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden transition-all duration-300 hover:-translate-y-1">
                <div class="h-56 flex items-center justify-center relative overflow-hidden" style="background: {{ $gradient }};">
                    <div class="text-center text-white px-6 relative z-10">
                        <div class="text-4xl font-black mb-2">{{ substr($project->title, 0, 2) }}</div>
                        <div class="text-sm font-semibold opacity-80">{{ $project->client }}</div>
                    </div>
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                    @if($project->is_featured)
                    <div class="absolute top-4 right-4 bg-gold text-white text-xs font-bold px-3 py-1 rounded-full">Featured</div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-2 mb-3">
                        @foreach(array_slice($project->tags ?? [], 0, 3) as $tag)
                        <span class="text-xs font-semibold bg-gold-light text-gold-dark px-2.5 py-1 rounded-full">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-gold transition-colors">{{ $project->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ $project->short_description }}</p>
                    <a href="{{ route('portfolio.show', $project->slug) }}" class="inline-flex items-center gap-1.5 text-gold font-semibold text-sm hover:gap-2.5 transition-all">
                        View Details
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-5">Your Project Could Be Next</h2>
        <p class="text-white/80 text-lg mb-10 max-w-xl mx-auto">We'd love to learn about your goals and show you how we can help you achieve them.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-xl hover:-translate-y-0.5 text-lg">
            Start Your Project
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

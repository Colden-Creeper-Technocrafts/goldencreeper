@extends('layouts.app')

@section('title', $project->title)
@section('meta_description', $project->short_description)

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 text-gold-dark hover:text-gold font-semibold text-sm mb-8 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Portfolio
        </a>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <div>
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($project->tags ?? [] as $tag)
                    <span class="text-xs font-bold bg-gold text-white px-3 py-1 rounded-full">{{ $tag }}</span>
                    @endforeach
                </div>
                <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mb-4">{{ $project->title }}</h1>
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span class="text-gray-700 font-semibold">{{ $project->client }}</span>
                </div>
                <p class="text-xl text-gray-600 leading-relaxed">{{ $project->short_description }}</p>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-xl h-64 lg:h-80" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
                <div class="w-full h-full flex items-center justify-center text-white text-center p-8">
                    <div>
                        <div class="text-6xl font-black mb-3">{{ substr($project->title, 0, 2) }}</div>
                        <div class="text-lg font-semibold opacity-80">{{ $project->client }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Project Detail --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Main content --}}
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-black text-gray-900 mb-8">Project Overview</h2>
                <div class="text-gray-600 leading-relaxed text-lg space-y-4 prose prose-lg max-w-none">
                    {!! nl2br(e($project->description)) !!}
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wide">Project Details</h3>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">Client</dt>
                            <dd class="text-gray-900 font-semibold text-sm">{{ $project->client }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">Technologies</dt>
                            <dd class="flex flex-wrap gap-1.5 mt-1">
                                @foreach($project->tags ?? [] as $tag)
                                <span class="text-xs bg-gold-light text-gold-dark font-semibold px-2 py-0.5 rounded">{{ $tag }}</span>
                                @endforeach
                            </dd>
                        </div>
                        @if($project->is_featured)
                        <div>
                            <dt class="text-xs text-gray-500 font-medium uppercase tracking-wide mb-1">Status</dt>
                            <dd><span class="text-xs bg-gold text-white font-bold px-2 py-0.5 rounded">Featured Project</span></dd>
                        </div>
                        @endif
                    </dl>
                </div>
                <div class="bg-gold rounded-2xl p-6 text-white text-center">
                    <h3 class="font-bold text-lg mb-2">Have a similar project?</h3>
                    <p class="text-white/80 text-sm mb-5">Let's talk about how we can help you achieve similar results.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white text-gold-dark font-bold px-5 py-2.5 rounded-xl hover:bg-gray-50 transition-colors text-sm">
                        Get in Touch
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Gallery placeholder --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-black text-gray-900 mb-8">Project Gallery</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach(['Dashboard Overview','Mobile Interface','Analytics View'] as $i => $label)
            @php
                $galleryGradients = [
                    'linear-gradient(135deg, #C9A84C33, #A68A3A55)',
                    'linear-gradient(135deg, #1e3a5f33, #2d5f8a55)',
                    'linear-gradient(135deg, #1a3a2a33, #2d6a4f55)',
                ];
            @endphp
            <div class="rounded-2xl h-48 flex items-center justify-center" style="background: {{ $galleryGradients[$i] }};">
                <div class="text-center text-gray-600">
                    <svg class="w-10 h-10 mx-auto mb-2 text-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="text-sm font-medium text-gray-500">{{ $label }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Related Projects --}}
@if($related->isNotEmpty())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-black text-gray-900 mb-10">More Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $i => $rel)
            @php
                $gradients2 = [
                    'linear-gradient(135deg, #C9A84C, #A68A3A)',
                    'linear-gradient(135deg, #1e3a5f, #2d5f8a)',
                    'linear-gradient(135deg, #1a3a2a, #2d6a4f)',
                ];
            @endphp
            <div class="group bg-white rounded-2xl border border-gray-100 hover:border-gold/30 shadow-sm hover:shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-1">
                <div class="h-36 flex items-center justify-center text-white font-black text-3xl" style="background: {{ $gradients2[$i % count($gradients2)] }};">
                    {{ substr($rel->title, 0, 2) }}
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 mb-1 group-hover:text-gold transition-colors">{{ $rel->title }}</h3>
                    <p class="text-gray-500 text-xs mb-3">{{ $rel->client }}</p>
                    <a href="{{ route('portfolio.show', $rel->slug) }}" class="text-gold font-semibold text-sm inline-flex items-center gap-1">
                        View <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-20" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-black text-white mb-5">Ready to Build Your Success Story?</h2>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-xl hover:-translate-y-0.5">
            Start Your Project
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

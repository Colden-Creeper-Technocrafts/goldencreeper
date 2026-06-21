@extends('layouts.app')

@section('title', $service->title)
@section('meta_description', $service->short_description)

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-gold-dark hover:text-gold font-semibold text-sm mb-8 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            All Services
        </a>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="w-16 h-16 bg-gold rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($service->icon === 'code')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        @elseif($service->icon === 'device-phone-mobile')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        @elseif($service->icon === 'globe-alt')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>
                        @elseif($service->icon === 'cloud')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                        @elseif($service->icon === 'sparkles')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        @endif
                    </svg>
                </div>
                <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mb-6">{{ $service->title }}</h1>
                <p class="text-xl text-gray-600 leading-relaxed">{{ $service->short_description }}</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <h3 class="font-bold text-gray-900 mb-5">Why choose this service?</h3>
                <ul class="space-y-4">
                    @foreach(['Expert team with proven track record','Scalable solutions built to last','Transparent pricing and timelines','Full post-launch support included'] as $benefit)
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-gold flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-gray-700 text-sm">{{ $benefit }}</span>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center gap-2 bg-gold hover:bg-gold-dark text-white font-semibold px-6 py-3 rounded-xl transition-colors w-full justify-center">
                    Discuss Your Project
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Full Description --}}
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <h2 class="text-3xl font-black text-gray-900 mb-8">About This Service</h2>
            <div class="text-gray-600 leading-relaxed text-lg space-y-4">
                {!! nl2br(e($service->description)) !!}
            </div>
        </div>
    </div>
</section>

{{-- Related Services --}}
@if($related->isNotEmpty())
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black text-gray-900">Related Services</h2>
            <p class="text-gray-600 mt-3">Explore other ways we can help your business grow.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $rel)
            <a href="{{ route('services.show', $rel->slug) }}" class="group bg-white rounded-2xl p-7 shadow-sm hover:shadow-lg border border-gray-100 hover:border-gold/30 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-gold transition-colors">{{ $rel->title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $rel->short_description }}</p>
                <span class="inline-flex items-center gap-1 text-gold font-semibold text-sm">
                    Learn More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-5">Ready to Get Started?</h2>
        <p class="text-white/80 text-lg mb-10">Tell us about your project and we'll get back to you within one business day with a tailored proposal.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-xl hover:-translate-y-0.5 text-lg">
            Get a Free Quote
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

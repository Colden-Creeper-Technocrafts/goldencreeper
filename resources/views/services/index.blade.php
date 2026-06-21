@extends('layouts.app')

@section('title', 'Our Services')
@section('meta_description', 'Explore GoldenCreeper\'s full range of software development services including custom software, mobile apps, web development, cloud solutions, and UI/UX design.')

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-3xl">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">What We Offer</span>
            <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-6">Services That Drive Results</h1>
            <p class="text-xl text-gray-600 leading-relaxed">From building your first product to scaling your existing platform, we bring the technical expertise and product thinking to make it happen.</p>
        </div>
    </div>
</section>

{{-- Services Grid --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl border border-gray-100 hover:border-gold/30 transition-all duration-300 hover:-translate-y-1 flex flex-col">
                <div class="w-14 h-14 bg-gold-light rounded-2xl flex items-center justify-center mb-6 group-hover:bg-gold transition-colors duration-300">
                    <svg class="w-7 h-7 text-gold group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        @elseif($service->icon === 'briefcase')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        @endif
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-gold transition-colors">{{ $service->title }}</h2>
                <p class="text-gray-600 text-sm leading-relaxed mb-4 flex-1">{{ $service->description }}</p>
                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-gold font-semibold text-sm hover:gap-2.5 transition-all mt-4 group-hover:gap-2.5">
                    Learn More
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Our Process --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">How We Work</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">Our Development Process</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">A proven process that keeps projects on track, on budget, and aligned with your business goals at every step.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 relative">
            {{-- Connecting line --}}
            <div class="hidden lg:block absolute top-12 left-[12.5%] right-[12.5%] h-0.5 bg-gold/30 z-0"></div>
            @foreach([
                ['1','Discovery','We dive deep into your business goals, user needs, and technical requirements to build a solid foundation.'],
                ['2','Design','Our designers create wireframes, prototypes, and pixel-perfect UI that your users will love to interact with.'],
                ['3','Development','Our engineers build your product in agile sprints, with regular demos so you see progress every two weeks.'],
                ['4','Launch & Support','We deploy your product, monitor performance, and provide ongoing support to keep everything running smoothly.'],
            ] as $step)
            <div class="relative z-10 text-center">
                <div class="w-24 h-24 rounded-full bg-gold flex items-center justify-center mx-auto mb-6 shadow-lg shadow-gold/25">
                    <span class="text-white font-black text-3xl">{{ $step[0] }}</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $step[1] }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $step[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-5">Let's Build Something Great Together</h2>
        <p class="text-white/80 text-lg mb-10 max-w-xl mx-auto">Tell us about your project and we'll put together a tailored proposal within 48 hours.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-xl hover:-translate-y-0.5 text-lg">
            Get a Free Quote
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

@extends('layouts.app')

@section('title', 'Custom Software Development Company')
@php

@endphp
@section('meta_description', $settings['hero_subtitle'] ?? 'GoldenCreeper builds custom software, mobile apps, and web solutions that help businesses scale and grow.')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="relative min-h-screen bg-white flex items-center overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-gold-light opacity-60"></div>
        <div class="absolute top-1/2 -right-20 w-64 h-64 rounded-full bg-gold opacity-10"></div>
        <div class="absolute -bottom-20 right-40 w-48 h-48 rounded-full bg-gold-light opacity-80"></div>
        <div class="absolute top-20 -left-10 w-32 h-32 rounded-full bg-gold opacity-5"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Text --}}
            <div>
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-gold-light border border-gold/30 text-gold-dark font-semibold text-sm px-4 py-2 rounded-full mb-8">
                    <span>🚀</span>
                    <x-sk name="hero_badge" :value="$settings['hero_badge'] ?? 'Your Vision, Our Expertise'" />
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-gray-900 leading-tight mb-6">
                    <x-sk name="hero_title" :value="$settings['hero_title'] ?? 'We Build Software That'" />
                    <span class="text-gold block"><x-sk name="hero_title_highlight" :value="$settings['hero_title_highlight'] ?? 'Drives Growth'" /></span>
                </h1>

                <p class="text-lg text-gray-600 leading-relaxed mb-10 max-w-xl">
                    <x-sk name="hero_subtitle" :value="$settings['hero_subtitle'] ?? 'From concept to launch, we craft digital solutions that help businesses scale, engage customers, and achieve measurable results.'" />
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center gap-2 bg-gold hover:bg-gold-dark text-white font-semibold px-8 py-4 rounded-xl transition-all duration-200 shadow-lg shadow-gold/25 hover:shadow-gold/40 hover:-translate-y-0.5">
                        <x-sk name="hero_btn_primary" :value="$settings['hero_btn_primary'] ?? 'Our Services'" />
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 border-2 border-gold text-gold hover:bg-gold hover:text-white font-semibold px-8 py-4 rounded-xl transition-all duration-200">
                        <x-sk name="hero_btn_secondary" :value="$settings['hero_btn_secondary'] ?? 'Get a Free Quote'" />
                    </a>
                </div>
            </div>

            {{-- Right: Geometric Visual --}}
            <div class="hidden lg:flex items-center justify-center relative">
                <div class="relative w-[480px] h-[480px]">
                    {{-- Outer ring --}}
                    <div class="absolute inset-0 rounded-full border-2 border-dashed border-gold/20 animate-spin" style="animation-duration: 30s;"></div>
                    {{-- Main card --}}
                    <div class="absolute inset-8 rounded-3xl bg-gradient-to-br from-gold to-gold-dark shadow-2xl flex items-center justify-center">
                        <div class="text-center text-white p-8">
                            <div class="text-6xl font-black mb-3">GC</div>
                            <div class="text-lg font-semibold opacity-90"><x-sk name="company_name" :value="$settings['company_name'] ?? 'GoldenCreeper'" /></div>
                            <div class="text-sm opacity-70 mt-1">Software Studio</div>
                            <div class="mt-6 space-y-2">
                                @foreach($services->take(3) as $service)
                                <div class="bg-white/20 rounded-xl px-4 py-2 text-center text-sm font-semibold opacity-90">{{ $service->title }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Floating badges --}}
                    <div class="absolute -top-4 -right-4 bg-white rounded-2xl shadow-xl p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-gold-light rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">Free Consultation</div>
                            <div class="text-xs text-gray-500">No obligation</div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-xl p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">Quality Guaranteed</div>
                            <div class="text-xs text-gray-500">Rigorous testing</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== SERVICES SECTION ===== --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">What We Do</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">Services Built for Growth</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">From mobile apps to enterprise platforms, we deliver end-to-end software solutions tailored to your unique business needs.</p>
        </div>

        @if($services->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($services as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="group bg-white rounded-2xl p-7 shadow-sm hover:shadow-lg border border-gray-100 hover:border-gold/30 transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gold-light rounded-xl flex items-center justify-center mb-5 group-hover:bg-gold transition-colors duration-300">
                    <svg class="w-6 h-6 text-gold group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-gold transition-colors">{{ $service->title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $service->short_description }}</p>
                <span class="inline-flex items-center gap-1 text-gold font-semibold text-sm group-hover:gap-2 transition-all">
                    Learn More
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </a>
            @endforeach
        </div>
        @endif

        <div class="text-center">
            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 border-2 border-gold text-gold hover:bg-gold hover:text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-200">
                View All Services
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ===== VALUE PROPOSITIONS BAR ===== --}}
<section class="py-12 bg-gold-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            @foreach([
                ['✓', 'Free Consultation',    'No cost, no obligation'],
                ['⚡', 'Fast Turnaround',      'Agile delivery sprints'],
                ['🔒', 'Quality Guaranteed',   'Rigorous testing & QA'],
                ['🤝', 'Dedicated Support',    'We\'re with you post-launch'],
            ] as $prop)
            <div class="flex flex-col items-center">
                <div class="text-2xl mb-2">{{ $prop[0] }}</div>
                <div class="text-white font-bold text-sm mb-1">{{ $prop[1] }}</div>
                <div class="text-gold-light text-xs opacity-80">{{ $prop[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ===== WHY CHOOSE US ===== --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div>
                <span class="text-gold font-semibold text-sm uppercase tracking-widest">Why GoldenCreeper</span>
                <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-8"><x-sk name="why_us_title" :value="$settings['why_us_title'] ?? 'Why Businesses Choose GoldenCreeper'" /></h2>

                <div class="space-y-5">
                    @foreach([
                        ['why_us_1_title', $settings['why_us_1_title'] ?? 'On-Time Delivery',          'why_us_1_desc', $settings['why_us_1_desc'] ?? 'We\'ve maintained a 96% on-time delivery rate across all projects.'],
                        ['why_us_2_title', $settings['why_us_2_title'] ?? 'Transparent Communication', 'why_us_2_desc', $settings['why_us_2_desc'] ?? 'Weekly status updates, dedicated Slack channels, and zero surprises.'],
                        ['why_us_3_title', $settings['why_us_3_title'] ?? 'Scalable Architecture',     'why_us_3_desc', $settings['why_us_3_desc'] ?? 'Every system we build is designed to grow with your business.'],
                        ['why_us_4_title', $settings['why_us_4_title'] ?? 'Post-Launch Support',       'why_us_4_desc', $settings['why_us_4_desc'] ?? 'Our relationship doesn\'t end at launch.'],
                    ] as $point)
                    <div class="flex items-start gap-4">
                        <div class="w-7 h-7 rounded-full bg-gold flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1"><x-sk name="{{ $point[0] }}" :value="$point[1]" /></h4>
                            <p class="text-gray-600 text-sm leading-relaxed"><x-sk name="{{ $point[2] }}" :value="$point[3]" /></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-gold-light rounded-3xl p-8 lg:p-10">
                <h3 class="text-xl font-bold text-gray-900 mb-8">Our Commitments</h3>
                <div class="grid grid-cols-2 gap-6">
                    @foreach([
                        ['$0',   'Hidden fees ever'],
                        ['24h',  'Response time'],
                        ['100%', 'Ownership &amp; transparency'],
                        ['∞',    'Post-launch support'],
                    ] as $item)
                    <div class="bg-white rounded-2xl p-5 text-center shadow-sm">
                        <div class="text-3xl font-black text-gold mb-1">{!! $item[0] !!}</div>
                        <div class="text-gray-600 text-xs font-medium leading-tight">{!! $item[1] !!}</div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8 text-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-dark text-white font-semibold px-6 py-3 rounded-xl transition-colors shadow-md">
                        Start Your Project
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TESTIMONIALS ===== --}}
<section class="py-24 bg-gold-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Testimonials</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">What Our Clients Say</h2>
            <p class="text-lg text-gray-600 max-w-xl mx-auto">Don't take our word for it — hear from the businesses we've helped grow.</p>
        </div>

        @if($testimonials->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-2xl p-7 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center gap-1 mb-5">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                    <svg class="w-5 h-5 text-gold" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    @endfor
                </div>
                <blockquote class="text-gray-700 text-sm leading-relaxed mb-6 italic">"{{ $testimonial->content }}"</blockquote>
                <div class="flex items-center gap-3 border-t border-gray-100 pt-5">
                    <div class="w-10 h-10 rounded-full bg-gold flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-sm">{{ substr($testimonial->client_name, 0, 1) }}</span>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm">{{ $testimonial->client_name }}</div>
                        <div class="text-gray-500 text-xs">{{ $testimonial->client_role }}, {{ $testimonial->client_company }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ===== BLOG SECTION ===== --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Insights</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">Latest Insights</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Practical articles on software development, design, and technology strategy from our team.</p>
        </div>

        @if($posts->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @foreach($posts as $post)
            <article class="group bg-white rounded-2xl border border-gray-100 hover:border-gold/30 shadow-sm hover:shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-1">
                <div class="h-44 flex items-center justify-center" style="background: linear-gradient(135deg, #C9A84C22, #A68A3A33);">
                    <span class="text-4xl font-black text-gold/30">{{ substr($post->category, 0, 1) }}</span>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-bold bg-gold text-white px-2.5 py-1 rounded-full">{{ $post->category }}</span>
                        <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($post->published_at)->format('M j, Y') }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-3 leading-snug group-hover:text-gold transition-colors line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-5 line-clamp-3">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">By {{ $post->author }}</span>
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

        <div class="text-center">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 border-2 border-gold text-gold hover:bg-gold hover:text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-200">
                View All Posts
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ===== CTA SECTION ===== --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-6"><x-sk name="home_cta_title" :value="$settings['home_cta_title'] ?? 'Ready to Start Your Project?'" /></h2>
        <p class="text-lg text-white/80 mb-10 max-w-2xl mx-auto"><x-sk name="home_cta_subtitle" :value="$settings['home_cta_subtitle'] ?? 'Let\'s talk about your vision and build something amazing together. Free consultation, no obligation.'" /></p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all duration-200 shadow-xl hover:shadow-2xl hover:-translate-y-0.5 text-lg">
                Get a Free Consultation
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center gap-2 border-2 border-white/60 text-white hover:border-white hover:bg-white/10 font-semibold px-10 py-4 rounded-xl transition-all duration-200">
                See Our Work
            </a>
        </div>
    </div>
</section>

@endsection

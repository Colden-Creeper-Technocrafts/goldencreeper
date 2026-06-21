@extends('layouts.app')

@section('title', 'About')
@section('meta_description', $settings['about_intro'] ?? 'GoldenCreeper — code on demand, fractional tech leadership, and AI expertise from a solo founder based in India.')

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-3xl">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Who I Am</span>
            <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-6">About GoldenCreeper</h1>
            <p class="text-xl text-gray-600 leading-relaxed"><x-sk name="about_intro" :value="$settings['about_intro'] ?? 'I\'m Raj Thakkar — Founder & Solution Architect at GoldenCreeper. I work with businesses and developers to deliver real code, real skills, and real results.'" /></p>
        </div>
    </div>
</section>

{{-- My Story --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <span class="text-gold font-semibold text-sm uppercase tracking-widest">My Story</span>
                <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-6">Why I Built GoldenCreeper</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p><x-sk name="about_story_p1" :value="$settings['about_story_p1'] ?? 'GoldenCreeper started from a simple frustration: too many software agencies over-promise, under-deliver, and leave clients with code they don\'t understand and can\'t maintain.'" /></p>
                    <p><x-sk name="about_story_p2" :value="$settings['about_story_p2'] ?? 'As a solo founder and solution architect based in India, I work directly with every client — no middlemen, no handoffs to junior developers.'" /></p>
                    <p><x-sk name="about_story_p3" :value="$settings['about_story_p3'] ?? 'Whether you need a specific piece of code written, your existing codebase reviewed and fixed, a technical lead for your team, or training to get more out of AI tools — I can help.'" /></p>
                </div>
            </div>

            {{-- What makes it different --}}
            <div class="space-y-4">
                @foreach([
                    ['🎯', 'You Work With Me Directly',   'No account managers, no junior handoffs. Every engagement is handled personally by me — the founder.'],
                    ['📦', 'You Own Everything',          'Every line of code I write or sell belongs to you outright. No licences, no vendor lock-in.'],
                    ['⚡', 'Fast & Focused',              'No bloated processes. You describe the need, I scope it clearly, and I deliver it.'],
                    ['🤖', 'AI-Native Approach',          'From token optimization to prompt training, AI is central to how I work and what I teach.'],
                ] as $point)
                <div class="flex items-start gap-4 p-5 rounded-2xl border border-gray-100 hover:border-gold/30 hover:shadow-sm transition-all">
                    <div class="text-2xl flex-shrink-0 mt-0.5">{{ $point[0] }}</div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">{{ $point[1] }}</h4>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $point[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Mission & Vision --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">My Purpose</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3">Mission & Vision</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-3xl p-10 shadow-sm border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1 h-full bg-gold rounded-l-3xl"></div>
                <div class="w-14 h-14 bg-gold-light rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Mission</h3>
                <p class="text-gray-600 leading-relaxed text-lg"><x-sk name="about_mission" :value="$settings['about_mission'] ?? 'To give every business access to senior-level code quality, AI expertise, and technical leadership on their own terms.'" /></p>
            </div>
            <div class="bg-gold rounded-3xl p-10 shadow-sm relative overflow-hidden">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-2xl font-black text-white mb-4">Vision</h3>
                <p class="text-white/90 leading-relaxed text-lg"><x-sk name="about_vision" :value="$settings['about_vision'] ?? 'A world where businesses own their technology outright, understand it fully, and aren\'t dependent on agencies to keep it running.'" /></p>
            </div>
        </div>
    </div>
</section>

{{-- Values --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">How I Work</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">My Working Principles</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Not buzzwords — actual principles that shape every project and every client relationship.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['Ownership',      'I treat every client\'s problem as my own. I don\'t clock out when something isn\'t working.',             '🎯'],
                ['Honesty',        'If something will take longer, cost more, or isn\'t the right approach — I\'ll tell you upfront.',          '🔍'],
                ['Code Quality',   'I never ship code I\'m not proud of. Clean, documented, and maintainable — every time.',                    '✨'],
                ['No Fluff',       'No unnecessary meetings, bloated reports, or process for process\'s sake. Just the work that matters.',      '⚡'],
            ] as $value)
            <div class="text-center p-8 rounded-2xl border border-gray-100 hover:border-gold/40 hover:shadow-lg transition-all duration-300 group">
                <div class="text-4xl mb-5">{{ $value[2] }}</div>
                <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-gold transition-colors">{{ $value[0] }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $value[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Founder Profile --}}
@if($team->isNotEmpty())
<section class="py-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">The People Behind It</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3">The Founders</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($team as $member)
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex flex-col">
            <div class="flex items-center gap-5 mb-5">
                <div class="w-20 h-20 rounded-2xl bg-gold flex items-center justify-center flex-shrink-0 shadow-lg">
                    <span class="text-white font-black text-2xl">{{ substr($member->name, 0, 1) }}{{ substr(strrchr($member->name, ' ') ?: ' ', 1, 1) }}</span>
                </div>
                <div>
                    <h3 class="text-xl font-black text-gray-900">{{ $member->name }}</h3>
                    <p class="text-gold font-semibold text-sm mt-0.5">{{ $member->role }}</p>
                    <p class="text-gray-400 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        India
                    </p>
                </div>
            </div>
            <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-1">{{ $member->bio }}</p>
            <div class="flex items-center gap-3">
                @if(!empty($member->social_links['linkedin']) && $member->social_links['linkedin'] !== '#')
                <a href="{{ $member->social_links['linkedin'] }}" target="_blank" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gold hover:text-white text-gray-700 font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    LinkedIn
                </a>
                @endif
                @if(!empty($member->social_links['github']) && $member->social_links['github'] !== '#')
                <a href="{{ $member->social_links['github'] }}" target="_blank" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gold hover:text-white text-gray-700 font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                    GitHub
                </a>
                @endif
                @if(!empty($member->social_links['twitter']) && $member->social_links['twitter'] !== '#')
                <a href="{{ $member->social_links['twitter'] }}" target="_blank" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gold hover:text-white text-gray-700 font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.732-8.843L2.25 2.25h6.919l4.261 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
                    Twitter
                </a>
                @endif
            </div>
        </div>
        @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-5">Ready to Work Together?</h2>
        <p class="text-white/80 text-lg mb-10 max-w-xl mx-auto">Tell me what you need. I'll get back to you within 24 hours with a clear, honest response — no sales pitch.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-lg hover:-translate-y-0.5 text-lg">
            Get in Touch
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

@extends('layouts.app')

@section('title', 'Careers — Join Our Team')
@section('meta_description', 'Join the GoldenCreeper team. We\'re hiring talented engineers, designers, and marketers who want to build great software and grow their careers.')

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-3xl">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">We're Hiring</span>
            <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-6">Join Our Team</h1>
            <p class="text-xl text-gray-600 leading-relaxed">We're building a world-class team of engineers, designers, and builders who are passionate about creating software that makes a real difference. Come do the best work of your career.</p>
        </div>
    </div>
</section>

{{-- Why Work With Us --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Life at GoldenCreeper</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">Why You'll Love Working Here</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">We believe that happy, supported people build the best products. Here's what we offer our team.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['🌍','Remote-First','Work from anywhere in the world. We\'re fully remote-friendly with optional hub offices in San Francisco and New York.'],
                ['💰','Competitive Compensation','Market-rate salaries, equity packages, and performance bonuses. We believe in sharing our success with the team.'],
                ['📚','Learning & Growth','Annual $2,000 learning budget, weekly tech talks, conference attendance, and clear promotion pathways.'],
                ['⚖️','Work-Life Balance','Flexible hours, unlimited PTO policy, no crunch culture. We respect your time outside of work.'],
            ] as $perk)
            <div class="text-center p-7 rounded-2xl bg-gray-50 hover:bg-gold-light transition-colors group border border-gray-100">
                <div class="text-4xl mb-4">{{ $perk[0] }}</div>
                <h3 class="font-bold text-gray-900 mb-3 group-hover:text-gold transition-colors">{{ $perk[1] }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $perk[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Job Listings --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-gold font-semibold text-sm uppercase tracking-widest">Open Roles</span>
            <h2 class="text-3xl sm:text-4xl font-black text-gray-900 mt-3 mb-4">Current Openings</h2>
            <p class="text-lg text-gray-600 max-w-xl mx-auto">Don't see a perfect fit? We always welcome applications from exceptional people. <a href="{{ route('contact') }}" class="text-gold font-semibold hover:underline">Send us a note</a>.</p>
        </div>

        @if($jobs->isEmpty())
        <div class="text-center py-20 text-gray-500">
            <p class="text-lg font-medium">No open positions right now. Check back soon or send us a speculative application!</p>
        </div>
        @else
        <div class="space-y-6 max-w-4xl mx-auto">
            @foreach($jobs as $job)
            <div class="bg-white rounded-2xl p-7 shadow-sm hover:shadow-lg border border-gray-100 hover:border-gold/30 transition-all duration-300 group">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            <span class="text-xs font-bold bg-gold text-white px-2.5 py-1 rounded-full">{{ $job->department }}</span>
                            <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                {{ $job->location }}
                            </span>
                            <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full">{{ $job->type }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-gold transition-colors">{{ $job->title }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ $job->short_description }}</p>

                        <div x-data="{ expanded: false }">
                            <div x-show="expanded" x-collapse class="text-gray-600 text-sm leading-relaxed mb-4 prose prose-sm max-w-none">
                                {!! $job->description !!}
                            </div>
                            <button
                                @click="expanded = !expanded"
                                class="text-gold font-semibold text-sm hover:text-gold-dark transition-colors inline-flex items-center gap-1"
                            >
                                <span x-text="expanded ? 'Show Less' : 'View Full Description'"></span>
                                <svg class="w-4 h-4 transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <a
                            href="{{ route('contact') }}?subject=Application+for+{{ urlencode($job->title) }}"
                            class="inline-flex items-center gap-2 bg-gold hover:bg-gold-dark text-white font-semibold px-6 py-3 rounded-xl transition-colors shadow-sm whitespace-nowrap"
                        >
                            Apply Now
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-24" style="background: linear-gradient(135deg, #C9A84C 0%, #A68A3A 100%);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-5">Don't See the Right Role?</h2>
        <p class="text-white/80 text-lg mb-10 max-w-xl mx-auto">We're always looking for exceptional talent. Send us your CV and a note about what you'd like to do — we'd love to hear from you.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gold-dark font-bold px-10 py-4 rounded-xl transition-all shadow-xl hover:-translate-y-0.5 text-lg">
            Get in Touch
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

@endsection

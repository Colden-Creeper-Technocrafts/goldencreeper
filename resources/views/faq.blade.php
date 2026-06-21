@extends('layouts.app')

@section('title', 'Frequently Asked Questions')
@section('meta_description', 'Find answers to common questions about working with GoldenCreeper, including our process, pricing, timelines, and support model.')

@section('content')

{{-- Hero --}}
<section class="py-24 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <span class="text-gold font-semibold text-sm uppercase tracking-widest">Got Questions?</span>
        <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-6">Frequently Asked Questions</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">Everything you need to know about working with GoldenCreeper. Can't find your answer? <a href="{{ route('contact') }}" class="text-gold font-semibold hover:underline">Just ask us</a>.</p>
    </div>
</section>

{{-- FAQ Content --}}
<section class="py-24 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        @forelse($faqs as $category => $categoryFaqs)
        <div class="mb-14">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-1 h-8 bg-gold rounded-full"></div>
                <h2 class="text-2xl font-black text-gray-900">{{ $category }}</h2>
            </div>

            <div class="space-y-4" x-data="{}">
                @foreach($categoryFaqs as $faq)
                <div
                    x-data="{ open: false }"
                    class="border border-gray-200 rounded-2xl overflow-hidden hover:border-gold/40 transition-colors"
                >
                    <button
                        @click="open = !open"
                        class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left bg-white hover:bg-gold-light transition-colors"
                        :class="open ? 'bg-gold-light' : ''"
                    >
                        <span class="font-semibold text-gray-900 text-base leading-snug pr-4">{{ $faq->question }}</span>
                        <div class="w-8 h-8 rounded-full bg-gold-light flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open ? 'rotate-45 bg-gold' : ''">
                            <svg class="w-4 h-4 transition-colors" :class="open ? 'text-white' : 'text-gold'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                    </button>
                    <div
                        x-show="open"
                        x-collapse
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="px-6 pb-6 pt-2 bg-gold-light border-t border-gold/10"
                    >
                        <p class="text-gray-700 leading-relaxed">{{ $faq->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <p class="text-gray-500 text-center py-12">No FAQs available yet. Please check back soon.</p>
        @endforelse

        {{-- Still have questions? --}}
        <div class="mt-8 bg-gray-50 rounded-3xl p-10 text-center border border-gray-100">
            <h3 class="text-2xl font-black text-gray-900 mb-3">Still Have Questions?</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">We're happy to answer any questions you have about working with us. Reach out and we'll get back to you within one business day.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-gold hover:bg-gold-dark text-white font-bold px-8 py-4 rounded-xl transition-colors shadow-md">
                Ask Us Anything
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// Alpine collapse plugin fallback for x-collapse
document.addEventListener('alpine:init', () => {
    // x-collapse is handled by Alpine natively via x-show with transitions
});
</script>
@endpush

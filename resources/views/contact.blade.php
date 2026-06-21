@extends('layouts.app')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with GoldenCreeper. Tell us about your project and we\'ll get back to you within one business day.')

@section('content')

{{-- Hero --}}
<section class="py-20 bg-gold-light relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-gold/10"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-gold/10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <span class="text-gold font-semibold text-sm uppercase tracking-widest">Let's Talk</span>
        <h1 class="text-4xl sm:text-5xl font-black text-gray-900 mt-3 mb-4">Get In Touch</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">Ready to start your project? Have a question? We'd love to hear from you. We typically respond within one business day.</p>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Success Message --}}
        @if(session('success'))
        <div class="max-w-4xl mx-auto mb-10">
            <div class="bg-green-50 border border-green-200 rounded-2xl p-6 flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-green-900 mb-1">Message Sent Successfully!</h3>
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        {{-- Error Summary --}}
        @if($errors->any())
        <div class="max-w-4xl mx-auto mb-10">
            <div class="bg-red-50 border border-red-200 rounded-2xl p-6">
                <h3 class="font-bold text-red-900 mb-3">Please fix the following errors:</h3>
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                    <li class="text-red-700 text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 max-w-6xl mx-auto">

            {{-- Left: Contact Info --}}
            <div class="lg:col-span-2 space-y-8">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 mb-3">Contact Information</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">Fill out the form and one of our team members will be in touch within one business day. For urgent matters, please reach out by phone or email directly.</p>
                </div>

                <div class="space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-gold-light rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 text-sm mb-0.5">Email Us</div>
                            <a href="mailto:{{ $settings['company_email'] ?? 'hello@goldencreeper.com' }}" class="text-gold hover:underline text-sm"><x-sk name="company_email" :value="$settings['company_email'] ?? 'hello@goldencreeper.com'" /></a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-gold-light rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 text-sm mb-0.5">Call Us</div>
                            <span class="text-gray-600 text-sm"><x-sk name="company_phone" :value="$settings['company_phone'] ?? '+1 (555) 123-4567'" /></span>
                        </div>
                    </div>
                    {{-- HIDDEN: Visit Us — enable when we have a physical/conference address to show
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-gold-light rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 text-sm mb-0.5">Visit Us</div>
                            <span class="text-gray-600 text-sm">{{ $settings['company_address'] ?? '123 Innovation Drive, San Francisco, CA 94107' }}</span>
                        </div>
                    </div>
                    --}}
                </div>

                {{-- Social Links --}}
                <div>
                    <div class="font-semibold text-gray-900 text-sm mb-3">Follow Us</div>
                    <div class="flex items-center gap-3">
                        @foreach([
                            ['twitter_url','Twitter','M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.732-8.843L2.25 2.25h6.919l4.261 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z'],
                            ['linkedin_url','LinkedIn','M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],
                            ['github_url','GitHub','M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12'],
                        ] as [$key, $label, $path])
                        @if(!empty($settings[$key]))
                        <a href="{{ $settings[$key] }}" class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gold hover:text-white flex items-center justify-center transition-colors group" aria-label="{{ $label }}">
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $path }}"/></svg>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>

                {{-- HIDDEN: Office Hours — enable and update with real hours when ready
                <div class="bg-gray-50 rounded-2xl p-5">
                    <h4 class="font-bold text-gray-900 text-sm mb-3">Office Hours</h4>
                    <dl class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Monday – Friday</dt>
                            <dd class="font-semibold text-gray-900">9:00 AM – 6:00 PM PT</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Saturday</dt>
                            <dd class="font-semibold text-gray-900">10:00 AM – 2:00 PM PT</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Sunday</dt>
                            <dd class="font-semibold text-gray-500">Closed</dd>
                        </div>
                    </dl>
                </div>
                --}}
            </div>

            {{-- Right: Contact Form --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8 lg:p-10">
                    <h2 class="text-2xl font-black text-gray-900 mb-2">Send Us a Message</h2>
                    <p class="text-gray-500 text-sm mb-8">We'll get back to you within one business day.</p>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="John Smith"
                                    class="w-full px-4 py-3 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold transition-colors {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}"
                                    required
                                >
                                @error('name')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="john@company.com"
                                    class="w-full px-4 py-3 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold transition-colors {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}"
                                    required
                                >
                                @error('email')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number <span class="text-gray-400 font-normal">(optional)</span></label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="+1 (555) 000-0000"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold transition-colors bg-white"
                                >
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject <span class="text-gray-400 font-normal">(optional)</span></label>
                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    value="{{ old('subject', request('subject')) }}"
                                    placeholder="What is this about?"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold transition-colors bg-white"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message <span class="text-red-500">*</span></label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="Tell us about your project — what you're building, the problem you're solving, your timeline, and any specific questions you have..."
                                class="w-full px-4 py-3 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gold focus:border-gold transition-colors resize-none {{ $errors->has('message') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-white' }}"
                                required
                            >{{ old('message') }}</textarea>
                            @error('message')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gold hover:bg-gold-dark text-white font-bold px-10 py-4 rounded-xl transition-all duration-200 shadow-lg shadow-gold/25 hover:shadow-gold/40 hover:-translate-y-0.5 text-base"
                        >
                            Send Message
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>

                        <p class="text-xs text-gray-400 mt-4">By sending this message you agree to our <a href="#" class="text-gold hover:underline">Privacy Policy</a>. We'll never share your information with third parties.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

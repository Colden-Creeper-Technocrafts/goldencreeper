<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'GoldenCreeper — Building Tomorrow\'s Software Today. We craft custom software, mobile apps, and web solutions that drive business growth.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'GoldenCreeper') — GoldenCreeper</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: {
                            DEFAULT: '#C9A84C',
                            dark: '#A68A3A',
                            light: '#FFF8E7',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .nav-link-active { color: #C9A84C; font-weight: 600; }
    </style>

    @stack('styles')
</head>
<body class="font-sans bg-white text-gray-800 antialiased">

@php
    $footerSettings = \App\Models\SiteSetting::pluck('value', 'key')->toArray();
    $footerServices = \App\Models\Service::where('is_active', true)->orderBy('sort_order')->get();
@endphp

<!-- ===== HEADER ===== -->
<header
    x-data="{ scrolled: false, mobileOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'shadow-lg' : 'shadow-sm'"
    class="fixed top-0 left-0 right-0 z-50 bg-white transition-shadow duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                <div class="w-10 h-10 bg-gold rounded-lg flex items-center justify-center shadow-md">
                    <span class="text-white font-black text-lg leading-none">GC</span>
                </div>
                <span class="text-xl font-bold">
                    <span class="text-gold">Golden</span><span class="text-gray-800">Creeper</span>
                </span>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-1">
                @php
                    $navLinks = [
                        'Home'     => 'home',
                        'About'    => 'about',
                        'Services' => 'services.index',
                        'Contact'  => 'contact',
                    ];
                @endphp
                @foreach($navLinks as $label => $routeName)
                    <a
                        href="{{ route($routeName) }}"
                        class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->routeIs($routeName) || (str_starts_with($routeName, 'services') && request()->routeIs('services.*')) ? 'text-gold font-semibold' : 'text-gray-600 hover:text-gold' }}"
                    >{{ $label }}</a>
                @endforeach
            </nav>

            <!-- CTA + Mobile Toggle -->
            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}" class="hidden lg:inline-flex items-center gap-2 bg-gold hover:bg-gold-dark text-white font-semibold text-sm px-5 py-2.5 rounded-lg transition-colors duration-200 shadow-sm">
                    Get a Quote
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>

                <!-- Hamburger -->
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gold hover:bg-gold-light transition-colors"
                    aria-label="Toggle menu"
                >
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="mobileOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white border-t border-gray-100 shadow-lg"
    >
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
            @foreach($navLinks as $label => $routeName)
                <a
                    href="{{ route($routeName) }}"
                    class="block px-4 py-3 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($routeName) ? 'bg-gold-light text-gold font-semibold' : 'text-gray-700 hover:bg-gold-light hover:text-gold' }}"
                    @click="mobileOpen = false"
                >{{ $label }}</a>
            @endforeach
            <div class="pt-2 pb-1">
                <a href="{{ route('contact') }}" class="block w-full text-center bg-gold hover:bg-gold-dark text-white font-semibold text-sm px-5 py-3 rounded-lg transition-colors">
                    Get a Quote
                </a>
            </div>
        </div>
    </div>
</header>

<!-- ===== MAIN CONTENT ===== -->
<main class="pt-20">
    @yield('content')
</main>

<!-- ===== FOOTER ===== -->
<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            <!-- Column 1: Brand -->
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gold rounded-lg flex items-center justify-center">
                        <span class="text-white font-black text-lg">GC</span>
                    </div>
                    <span class="text-xl font-bold">
                        <span class="text-gold">Golden</span><span class="text-white">Creeper</span>
                    </span>
                </a>
                <p class="text-gray-400 text-sm leading-relaxed mb-5">
                    <x-sk name="company_tagline" :value="$footerSettings['company_tagline'] ?? 'Building Tomorrow\'s Software Today'" />
                </p>
                <div class="flex items-center gap-3">
                    @if(!empty($footerSettings['twitter_url']) && $footerSettings['twitter_url'] !== '#')
                    <a href="{{ $footerSettings['twitter_url'] }}" class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-gold flex items-center justify-center transition-colors" aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.732-8.843L2.25 2.25h6.919l4.261 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
                    </a>
                    @endif
                    @if(!empty($footerSettings['linkedin_url']))
                    <a href="{{ $footerSettings['linkedin_url'] }}" class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-gold flex items-center justify-center transition-colors" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    @endif
                    @if(!empty($footerSettings['github_url']))
                    <a href="{{ $footerSettings['github_url'] }}" class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-gold flex items-center justify-center transition-colors" aria-label="GitHub">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                    </a>
                    @endif
                    @if(!empty($footerSettings['facebook_url']))
                    <a href="{{ $footerSettings['facebook_url'] }}" class="w-9 h-9 rounded-lg bg-gray-800 hover:bg-gold flex items-center justify-center transition-colors" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Column 2: Company -->
            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">Company</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-gold text-sm transition-colors">About Us</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-gray-400 hover:text-gold text-sm transition-colors">Services</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-gold text-sm transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Services -->
            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">Services</h4>
                <ul class="space-y-3">
                    @foreach($footerServices as $svc)
                    <li>
                        <a href="{{ route('services.show', $svc->slug) }}" class="text-gray-400 hover:text-gold text-sm transition-colors">
                            {{ $svc->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 4: Contact -->
            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">Get In Touch</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:{{ $footerSettings['company_email'] ?? 'hello@goldencreeper.com' }}" class="text-gray-400 hover:text-gold text-sm transition-colors">
                            <x-sk name="company_email" :value="$footerSettings['company_email'] ?? 'hello@goldencreeper.com'" />
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="text-gray-400 text-sm"><x-sk name="company_phone" :value="$footerSettings['company_phone'] ?? '+1 (555) 123-4567'" /></span>
                    </li>
                    {{-- HIDDEN: Address — enable when we have a physical/conference address to show
                    <li class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span class="text-gray-400 text-sm">{{ $footerSettings['company_address'] ?? '123 Innovation Drive, San Francisco, CA 94107' }}</span>
                    </li>
                    --}}
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="border-t border-gray-800 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} <x-sk name="company_name" :value="$footerSettings['company_name'] ?? 'GoldenCreeper'" />. All rights reserved.
            </p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-gray-500 hover:text-gold text-sm transition-colors">Privacy Policy</a>
                <a href="#" class="text-gray-500 hover:text-gold text-sm transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

@stack('scripts')

@if(auth()->check())
{{-- Admin inline setting editor --}}
<div
    x-data="skEditor()"
    @sk-edit.window="open($event.detail)"
    @keydown.escape.window="close()"
    x-show="isOpen"
    x-cloak
    class="fixed inset-0 z-[99999] flex items-center justify-center p-4"
    style="display:none"
>
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="close()"></div>

    {{-- Modal --}}
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6"
        @click.stop
    >
        {{-- Header --}}
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#FFF8E7">
                    <span style="font-size:14px">🔑</span>
                </div>
                <div>
                    <p class="text-xs text-gray-400 leading-none mb-0.5">Editing setting key</p>
                    <p class="text-sm font-mono font-bold" style="color:#C9A84C" x-text="key"></p>
                </div>
            </div>
            <button @click="close()" class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors text-gray-500 text-lg leading-none">&times;</button>
        </div>

        {{-- Input --}}
        <textarea
            x-ref="input"
            x-model="value"
            rows="3"
            class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 resize-none mb-4"
            style="focus-ring-color:#C9A84C"
            placeholder="Enter value..."
        ></textarea>

        {{-- Status --}}
        <div x-show="status === 'saved'" class="flex items-center gap-2 text-green-600 text-sm mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Saved successfully!
        </div>
        <div x-show="status === 'error'" class="flex items-center gap-2 text-red-600 text-sm mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            Something went wrong. Try again.
        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-end gap-3">
            <button @click="close()" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Cancel</button>
            <button
                @click="save()"
                :disabled="loading"
                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl text-white text-sm font-semibold transition-all disabled:opacity-60"
                style="background:#C9A84C"
            >
                <svg x-show="loading" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
                <span x-text="loading ? 'Saving...' : 'Save'"></span>
            </button>
        </div>
    </div>
</div>

<script>
function skEditor() {
    return {
        isOpen: false,
        key: '',
        value: '',
        loading: false,
        status: '',
        open(detail) {
            this.key = detail.key;
            this.value = detail.value;
            this.status = '';
            this.isOpen = true;
            this.$nextTick(() => this.$refs.input.focus());
        },
        close() {
            this.isOpen = false;
        },
        async save() {
            this.loading = true;
            this.status = '';
            try {
                const res = await fetch('{{ route('admin.setting.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ key: this.key, value: this.value })
                });
                const data = await res.json();
                if (data.success) {
                    this.status = 'saved';
                    window.dispatchEvent(new CustomEvent('sk-updated', { detail: { key: this.key, value: this.value } }));
                    setTimeout(() => this.close(), 900);
                } else {
                    this.status = 'error';
                }
            } catch (e) {
                this.status = 'error';
            }
            this.loading = false;
        }
    }
}
</script>
@endif

</body>
</html>

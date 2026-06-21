@props(['name', 'value'])
@if(auth()->check())
<span
    x-data="{ show: false, current: @js($value) }"
    @mouseenter="show = true"
    @mouseleave="show = false"
    @click.stop="$dispatch('sk-edit', { key: '{{ $name }}', value: current })"
    @sk-updated.window="if ($event.detail.key === '{{ $name }}') current = $event.detail.value"
    class="relative inline-block"
    style="cursor:pointer"
>
    <span x-text="current">{{ $value }}</span>
    <span x-show="show" x-cloak class="pointer-events-none absolute bottom-full left-0 mb-1.5 inline-flex items-center gap-1 bg-gray-900 text-[10px] font-mono px-2 py-0.5 rounded shadow-xl whitespace-nowrap" style="color:#C9A84C;z-index:9999">🔑 {{ $name }}</span>
</span>
@else
{{ $value }}
@endif

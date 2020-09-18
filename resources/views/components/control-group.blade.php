@props(['title'])

<div {{ $attributes->merge(['class' => 'border border-3 rounded p-4 shadow']) }}>
    <h3 class="font-bold text-xl text-teal-500">{{ $title }}</h3>

    {{ $slot }}
</div>

@props(['title'])

<div class="border border-3 rounded p-4 shadow-lg">
    <h3 class="font-bold text-lg text-teal-500">{{ $title }}</h3>

    {{ $slot }}
</div>

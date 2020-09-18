@props(['field', 'label', 'min' => 0, 'max' => 100])

<div class="mt-3">
    <label class="md:w-2/3 block text-gray-700 font-bold" for="{{ $field }}">{{ $label }}</label>
    <div class="text-gray-600 font-bold flex">
        <span>{{ $min }}</span>
        <input
            type="range"
            min="{{ $min }}"
            max="{{ $max }}"
            value="0"
            id="{{ $field }}"
            wire:model="manipulations.{{ $field }}"
            class="ml-2 mr-2 text-blue-500 flex-1"
        >
        <span>{{ $max }}</span>
    </div>
</div>

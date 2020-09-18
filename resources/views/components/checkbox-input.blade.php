@props(['field', 'label'])

<div class="mt-4">
    <label class="md:w-2/3 block text-gray-700 font-bold flex items-center">
        <input
            class="mr-2 leading-tight"
            type="checkbox"
            value="{{ $field }}"
            wire:model="manipulations.{{ $field }}"
        >
        <span class="text-sm">{{ $label }}</span>
    </label>
</div>

<div class="mt-3">
    <label class="md:w-2/3 block text-gray-700 font-bold" for="{{ $field }}">{{ $label }}</label>
    <div class="text-gray-600 font-bold flex">
        <span>0</span>
        <input
            type="range"
            min="-100"
            max="100"
            value="0"
            id="{{ $field }}"
            wire:model="manipulations.{{ $field }}"
            class="ml-2 mr-2 text-blue-500 flex-1"
        >
        <span>100</span>
    </div>
</div>

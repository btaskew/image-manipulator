<div>
    @if(!$image)
        @livewire('upload-image-form')
    @else
        <div class="border border-3 rounded p-8 bg-white mt-4 mb-4">
            <h2>Here is your image:</h2>
            <div class="h-64 mt-3 m-auto p-3 border border-3 rounded">
                <img
                    class="w-auto h-full m-auto"
                    src="{{ $image }}"
                    alt="If you can see this message your image was not uploaded successfully. Please refresh the page and try again."
                >
            </div>

            <x-control-group title="Effects">
                <x-checkbox-input label="Greyscale" field="greyscale" />
                <x-checkbox-input label="Sepia" field="sepia" />
            </x-control-group>

            <br />

            <x-control-group title="Adjustments">
                <x-range-input label="Brightness" field="brightness" />
                <x-range-input label="Contrast" field="contrast" />
            </x-control-group>

        </div>
    @endif
</div>

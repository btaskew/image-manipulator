<div style="max-width: 80%; min-width: 50%">
    @if(!$imageSource)
        @livewire('upload-image-form')
    @else
        <div class="border border-3 rounded p-8 bg-white mt-4 mb-4 flex items-center">
            <div class="img-container p-3 border border-3 rounded mr-4 flex" style="height: {{ $this->imageContainerHeight }}">
                <img
                    class="img-actual w-auto m-auto max-h-full"
                    src="{{ $imageSource }}"
                    alt="If you can see this message your image was not uploaded successfully. Please refresh the page and try again."
                >
            </div>

            <div class="flex-1">
                <x-control-group title="Adjustments">
                    <x-range-input label="Brightness" field="brightness" min="-100" />
                    <x-range-input label="Contrast" field="contrast" min="-100" />
                    <x-range-input label="Gamma" field="gamma" min="0.9" max="9.99" />
                </x-control-group>

                <x-control-group title="Effects" class="mt-4">
                    <x-range-input label="Blur" field="blur" />
                    <x-range-input label="Pixelate" field="pixelate" />
                    <x-range-input label="Sharpen" field="sharpen" />
                    <x-checkbox-input label="Greyscale" field="greyscale" />
                    <x-checkbox-input label="Sepia" field="sepia" />
                </x-control-group>
            </div>
        </div>
    @endif
</div>

<div>
    @if(!$image)
        @livewire('upload-image-form')
    @else
        <div>
            <h2>Here is your image:</h2>
            <div class="h-64 mt-3 m-auto p-3 border border-3 rounded">
                <img
                    class="w-auto h-full m-auto"
                    src="{{ $image }}"
                    alt="If you can see this message your image was not uploaded successfully. Please refresh the page and try again."
                >
                <button wire:click="manipulate">Manipulate image</button>
            </div>
        </div>
    @endif
</div>

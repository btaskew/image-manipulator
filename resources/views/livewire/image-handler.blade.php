<div>
    @if(!$image)
        @livewire('upload-image-form')
    @else
        <div>
            <h2>Here is your image:</h2>
            <img
                class="w-auto h-full m-auto"
                src="{{ $image->temporaryUrl() }}"
                alt="If you can see this message your image was not uploaded successfully. Please refresh the page and try again."
            >
        </div>
    @endif
</div>

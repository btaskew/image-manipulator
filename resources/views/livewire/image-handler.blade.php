<div class="border border-3 rounded p-8 bg-white">
    <h2 class="font-bold text-3xl text-teal-400">Upload your image to get started</h2>

    <div class="mt-4">
        <form wire:submit.prevent="save" class="flex flex-col" enctype="multipart/form-data">
            <input type="file" wire:model="image" class="hidden" name="image" id="image">

            <label class="mt-3 mb-3 w-90 flex flex-col items-center px-4 py-6 bg-gray-100 rounded-lg shadow-sm border border-blue cursor-pointer hover:font-bold" for="image">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal text-teal-700 uppercase">Select a file</span>
            </label>

            @error('image') <span class="error">{{ $message }}</span> @enderror

            <button type="submit" class="mt-8 bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">
                Use Image
            </button>
        </form>
    </div>
</div>

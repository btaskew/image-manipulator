<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class UploadImageForm extends Component
{
    use WithFileUploads;

    /**
     * @var TemporaryUploadedFile
     */
    public $image;

    public function useImage(): void
    {
        $fileName = $this->image->hashName();
        $this->image->storeAs('', $fileName, 'original_images');
        $this->image->storeAs('', $fileName, 'manipulated_images');
        $this->emit('imageUploaded', $fileName);
    }

    public function render()
    {
        return view('livewire.upload-image-form');
    }
}

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
        $this->emit('imageUploaded', $this->image->serializeForLivewireResponse());
    }

    public function render()
    {
        return view('livewire.upload-image-form');
    }
}

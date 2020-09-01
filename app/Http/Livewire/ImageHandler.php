<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ImageHandler extends Component
{
    use WithFileUploads;

    /**
     * @var TemporaryUploadedFile
     */
    public $image;

    public function save()
    {
        dd($this->image);
    }

    public function render()
    {
        return view('livewire.image-handler');
    }
}

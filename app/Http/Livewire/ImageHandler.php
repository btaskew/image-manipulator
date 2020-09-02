<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ImageHandler extends Component
{
    use WithFileUploads;

    /**
     * @var TemporaryUploadedFile|null
     */
    public $image = null;

    /**
     * @var string[]
     */
    protected $listeners = ['imageUploaded' => 'setImage'];

    /**
     * @param string $fileName
     */
    public function setImage(string $fileName): void
    {
        $this->image = TemporaryUploadedFile::unserializeFromLivewireRequest($fileName);
    }

    public function render()
    {
        return view('livewire.image-handler');
    }
}

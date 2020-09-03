<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\Image\Image;

class ImageHandler extends Component
{
    use WithFileUploads;

    /**
     * @var TemporaryUploadedFile|null
     */
    public $image = null;

    /**
     * @var string
     */
    public $fileName;

    /**
     * @var string[]
     */
    protected $listeners = ['imageUploaded' => 'setImage'];

    public function mount()
    {
        $this->disk = Storage::disk('manipulated_images');
    }

    /**
     * @param string $fileName
     */
    public function setImage(string $fileName): void
    {
        $this->fileName = $fileName;
        $this->image = $this->getDisk()->url($fileName);
    }

    public function manipulate()
    {
        $oldFileName = $this->fileName;
        $newFileName = Str::random(32) . '.jpeg';

        Image::load($this->getDisk()->path($oldFileName))
            ->setTemporaryDirectory('temp')
            ->greyscale()
            ->save($this->getDisk()->path($newFileName));

        $this->setImage($newFileName);

        $this->getDisk()->delete($oldFileName);
    }

    public function render()
    {
        return view('livewire.image-handler');
    }

    /**
     * @return Filesystem
     */
    private function getDisk(): Filesystem
    {
        return Storage::disk('manipulated_images');
    }
}

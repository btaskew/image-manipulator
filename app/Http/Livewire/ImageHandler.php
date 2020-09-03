<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ImageHandler extends Component
{
    use WithFileUploads;

    /**
     * @var string|null
     */
    public ?string $image = null;

    /**
     * @var string
     */
    public string $fileName = '';

    /**
     * @var string
     */
    public string $originalFileName = '';

    /**
     * @var array
     */
    public array $manipulations = [];

    /**
     * @var string[]
     */
    protected $listeners = ['imageUploaded' => 'handleNewImage'];

    public function mount(): void
    {
        // Reset image and load test image while deving
        $this->getDisk()->delete($this->getDisk()->allFiles());
        $testFile = Storage::disk('original_images')->get('test.jpeg');
        $this->getDisk()->put('test.jpeg', $testFile);
        $this->handleNewImage('test.jpeg');
    }

    /**
     * @param string $fileName
     */
    public function handleNewImage(string $fileName): void
    {
        $this->originalFileName = $fileName;
        $this->setImage($fileName);
    }

    /**
     * @param string $fileName
     */
    public function setImage(string $fileName): void
    {
        $this->fileName = $fileName;
        $this->image = $this->getDisk()->url($fileName);
    }

    public function manipulate(Manipulations $manipulations): void
    {
        $oldFileName = $this->fileName;
        $newFileName = Str::random(32) . '.jpeg';

        Image::load($this->getOriginalDisk()->path($this->originalFileName))
            ->setTemporaryDirectory('temp')
            ->manipulate($manipulations)
            ->save($this->getDisk()->path($newFileName));

        $this->setImage($newFileName);

        $this->getDisk()->delete($oldFileName);
    }

    public function updatedManipulations(): void
    {
        $manipulations = new Manipulations();

        foreach ($this->manipulations as $manipulation) {
            if (method_exists($manipulations, $manipulation)) {
                $manipulations->{$manipulation}();
            }
        }

        $this->manipulate($manipulations);
    }

    /**
     * @return View
     */
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

    /**
     * @return Filesystem
     */
    private function getOriginalDisk(): Filesystem
    {
        return Storage::disk('original_images');
    }
}

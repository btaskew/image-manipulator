<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageHandler extends Component
{
    use WithFileUploads;

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

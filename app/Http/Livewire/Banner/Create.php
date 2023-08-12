<?php

namespace App\Http\Livewire\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;
    public Banner $banner;

    public $photo;

    protected $rules = [
        'banner.name' => 'required|string',
        'banner.link' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:5000',
    ];

    public function mount(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function render()
    {
        return view('livewire.banner.create');
    }

    public function submit()
    {
        $this->validate();

        $this->banner->save();
        if ($this->photo) {
            $this->banner->clearMediaCollection('banner_image');
            $this->banner->addMedia($this->photo->getRealPath())->toMediaCollection('banner_image');
        }

        toastr()->success('Successfully add banner');
        return redirect()->route('banner.index');
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }
    
}

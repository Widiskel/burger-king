<?php

namespace App\Http\Livewire\Banner;

use App\Models\Banner;
use Livewire\Component;
use App\Http\Livewire\WithConfirmation;


class Index extends Component
{
    use WithConfirmation;

    public function render()
    {
        $banner = Banner::paginate(10);

        return view('livewire.banner.index',compact('banner'));
    }

    public function delete(Banner $banner)
    {
        $banner->delete();
    }
    
}

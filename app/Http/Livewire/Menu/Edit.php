<?php

namespace App\Http\Livewire\Menu;

use App\Models\Category;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;


class Edit extends Component
{
    use WithFileUploads;
    public Menu $menu;

    public array $listsForFields = [];

    public $photo;

    protected $rules = [
        'menu.name' => 'required|string',
        'menu.category_id' => 'required',
        'menu.price' => 'required|numeric',
        'menu.discount' => 'nullable|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
    ];

    public function mount(Menu $menu)
    {
        $this->menu = $menu;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.menu.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->menu->save();
        if ($this->photo) {
            $this->menu->clearMediaCollection('menu_image');
            $this->menu->addMedia($this->photo->getRealPath())->toMediaCollection('menu_image');
        }

        toastr()->success('Successfully update menu');
        return redirect()->route('menu.index');
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = Category::pluck('name', 'id')->toArray();
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }
    
}

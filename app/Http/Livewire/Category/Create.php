<?php

namespace App\Http\Livewire\Category;

use App\Helper;
use App\Models\Category;
use Livewire\Component;


class Create extends Component
{
    public Category $category;
    
    protected $rules = [
        'category.name' => 'required|string',
    ];

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->category->slug = Helper::generateSlug($this->category->name);
        $this->category->save();
        toastr()->success('Successfully add category');
        return redirect()->route('category.index');
    }
    
}

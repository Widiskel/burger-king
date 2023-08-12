<?php

namespace App\Http\Livewire\Category;

use App\Helper;
use App\Models\Category;
use Livewire\Component;


class Edit extends Component
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
        return view('livewire.category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->category->slug = Helper::generateSlug($this->category->name);
        $this->category->save();
        toastr()->success('Successfully update category');
        return redirect()->route('category.index');
    }
    
}

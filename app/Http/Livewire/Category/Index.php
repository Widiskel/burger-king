<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use App\Http\Livewire\WithConfirmation;


class Index extends Component
{
    use WithConfirmation;

    public function render()
    {
        $category = Category::paginate(10);

        return view('livewire.category.index',compact('category'));
    }

    public function delete(Category $category)
    {
        $category->delete();
    }
    
}

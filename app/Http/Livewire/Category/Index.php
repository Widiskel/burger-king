<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
    public Category $category;
    
    protected $rules = [
        'name' => 'required|string',
    ];

    public function render()
    {
        $category = Category::paginate(10);
        $te = 'te';
        return view('livewire.category.index',compact('category','te'));
    }

    public function submit()
    {
        $this->validate();
    }
    
}

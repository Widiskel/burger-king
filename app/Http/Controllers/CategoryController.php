<?php

namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index(){
        $this->authorize('Superadmin');

        return view('category.index');
    }

    public function create()
    {
        $this->authorize('Superadmin');

        return view('category.create');
    }
    public function show(Category $category)
    {
        $this->authorize('Superadmin');

        return view('category.show',compact('category'));
    }
    public function edit(Category $category)
    {
        $this->authorize('Superadmin');
        
        return view('category.edit',compact('category'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(){
        $this->authorize('Superadmin');

        return view('menu.index');
    }

    public function create()
    {
        $this->authorize('Superadmin');

        return view('menu.create');
    }
    public function edit(Menu $menu)
    {
        $this->authorize('Superadmin');
        
        return view('menu.edit',compact('menu'));
    }
}

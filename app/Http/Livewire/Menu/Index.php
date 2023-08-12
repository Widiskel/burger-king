<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;
use App\Http\Livewire\WithConfirmation;


class Index extends Component
{
    use WithConfirmation;

    public function render()
    {
        $menus = Menu::paginate(10);

        return view('livewire.menu.index',compact('menus'));
    }

    public function delete(Menu $menu)
    {
        $menu->delete();
    }
    
}

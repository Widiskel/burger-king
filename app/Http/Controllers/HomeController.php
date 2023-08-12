<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        $banner = Banner::all();
        return view('home.index', compact('menu','banner'));
    }
    public function menus($slug = null)
    {
        $category = Category::all();
        if($slug == null){
            $slug = $category[0]->slug;
        }
        $menu = Menu::whereRelation('category', 'slug', $slug)
        ->when(request()->search, function($q){
            $q->where('name','LIKE','%'.request()->search.'%');
        })
        ->get();
        return view('home.menus', compact('category', 'menu','slug'));
    }

    public function menus_detail($slug = null,$id)
    {

        $category = Category::all();
        $menu = Menu::find($id);
        return view('home.menus-detail', compact('category', 'menu','slug'));
    }
}

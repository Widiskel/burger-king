<?php

namespace App\Http\Controllers;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        $this->authorize('Superadmin');

        return view('banner.index');
    }

    public function create()
    {
        $this->authorize('Superadmin');

        return view('banner.create');
    }
    public function edit(Banner $banner)
    {
        $this->authorize('Superadmin');
        
        return view('banner.edit',compact('banner'));
    }
}

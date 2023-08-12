<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

class DashboardController extends Controller
{

    public function index(){
        $this->authorize('Superadmin');

        return view('dashboard.index');
    }
}

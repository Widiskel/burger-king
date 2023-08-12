<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public static function authorize($role){
        try {
            abort_if(!auth()->user()->hasRole($role),Response::HTTP_FORBIDDEN, '403 Forbidden');
        } catch (\Throwable $th) {
            return redirect()->route('home');
        }
    }
}

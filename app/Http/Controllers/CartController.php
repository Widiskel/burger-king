<?php

namespace App\Http\Controllers;
use App\Helper;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Intervention\Image\Response;

class CartController extends Controller
{
    public function index($slug)
    {
        return view('cart.index', compact('slug'));
    }

    public function floating()
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'store_code' => 'reference',
                'items' => [],
            ],
        );

        $data = [
            'cart' => $cart,
            'html' => Helper::generateCartHtml($cart->items),
        ];

        return response()->json($data);
    }
}

<?php

namespace App\Http\Livewire\Cart;

use App\Helper;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddToCart extends Component
{
    public Menu $menu;
    public $qty;

    public function mount(Menu $menu)
    {
        $this->menu = $menu;
        $this->qty = 1;
    }
    public function render()
    {
        return view('livewire.cart.add-to-cart');
    }

    public function plus()
    {
        $this->qty += 1;
    }
    public function minus()
    {
        if ($this->qty != 1) {
            $this->qty -= 1;
        } else {
            toastr()->error('Min buy is 1');
        }
    }

    public function addToCart()
    {
        $user  = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cart_menu = [];
        if($cart != null){
            $cart_menu = $cart->items;
        }

        if(collect($cart_menu)->contains('code', $this->menu->id)){
            $cart_menu = collect($cart_menu)->map(function ($item) {
                if ($item['code'] === $this->menu->id) {
                    $item['quantity'] += $this->qty;
                }
                return $item;
            });
        }else{
            $added_menu = [
                'code' => $this->menu->id,
                'quantity' => $this->qty,
                'notes' => '',
                'modifiers' => [],
            ];
            array_push($cart_menu,$added_menu);
        }
        
        $summary = Helper::getCartSummary($cart_menu);

        $data = [
            'store_code' => 'reference',
            'mobile_number' => '',
            'name' => $user->name,
            'address' => '',
            'latitude' => null,
            'longitude' => null,
            'notes' => '',
            'items' => $cart_menu,
            'subtotal' => $summary['subtotal'],
            'tax' => 0,
            'delivery_fee' => 0,
            'grand_total' => $summary['grandtotal'],
            'promotion_code' => '',
            'free_items' => [],
            'delivery_surcharge' => 0,
            'promotion_items' => [],
            'user_id' => $user->id,
        ];
        try {
            DB::beginTransaction();

            Cart::updateOrCreate(
                ['user_id' => $user->id],
                $data
            );        

            DB::commit();
            $this->emit('updateCart');
            toastr()->success('Successfully add menu to cart');
        } catch (\Throwable $th) {      
            toastr()->error('Failed add to cart');
        }
    }
}

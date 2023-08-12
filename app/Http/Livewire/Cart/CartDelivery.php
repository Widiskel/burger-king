<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartDelivery extends Component
{
    public Cart $cart;


    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->first();
    }
    public function render()
    {
        return view('livewire.cart.delivery');
    }

    public function submit($data){
        $this->cart->address = $data['address'];
        $this->cart->latitude = $data['latitude'];
        $this->cart->longitude = $data['longitude'];
        $this->cart->save();
        return redirect()->route('cart','payment');
    }
}

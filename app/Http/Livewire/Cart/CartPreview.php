<?php

namespace App\Http\Livewire\Cart;

use App\Helper;
use App\Models\Cart;
use Livewire\Component;

class CartPreview extends Component
{
    public Cart $cart;

    public array $cartItem = [];

    protected $rules = [
        'cart.notes' => 'nullable|string|max:30',
    ];

    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->first();
        $this->cartItem = $this->cart->items;
    }
    public function render()
    {
        return view('livewire.cart.preview');
    }

    public function plus($index)
    {
        $this->cartItem[$index]['quantity']++;
        $this->syncCart();
    }

    public function minus($index)
    {
        if ($this->cartItem[$index]['quantity'] > 1) {
            $this->cartItem[$index]['quantity']--;
        }
        $this->syncCart();
    }

    public function syncCart()
    {
        $summary = Helper::getCartSummary($this->cartItem);
        $this->cart->update(
            [
                'items' => $this->cartItem,
                'notes'=>$this->cart->notes,
                'subtotal' => $summary['subtotal'],
                'grand_total' => $summary['grandtotal'],
            ]
        );
        $this->cart->refresh();
    }

    public function submit(){
        $this->syncCart();
        return redirect()->route('cart','delivery');
    }

    public function removeItem($index){
        unset($this->cartItem[$index]);
        $this->syncCart();
    }
}

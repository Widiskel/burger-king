<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class CartPayment extends Component
{
    public Cart $cart;

    public $payment;
    public $code;

    protected $rules = [
        'payment' => 'required',
    ];
    protected $messages = [
        'payment.required' => 'Harap pilih metode pembayaran',
    ];

    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->first();
        $this->code = strtoupper(Str::random(10));
    }
    public function render()
    {
        return view('livewire.cart.payment');
    }
    public function submit()
    {
        try {
            DB::beginTransaction();
            Order::firstOrCreate(
                [
                    'code' => $this->code,
                ],
                [
                    'code' => $this->code,
                    'order_data' => $this->cart,
                    'payment_method' => $this->payment,
                    'user_id' => auth()->user()->id,
                ],
            );
            $this->cart->items = [];
            $this->cart->subtotal = 0;
            $this->cart->grand_total = 0;
            $this->cart->delivery_fee = 0;
            $this->cart->delivery_surcharge = 0;
            $this->cart->notes = '';
            $this->cart->updated_at = now();
            $this->cart->save();
            DB::commit();
            toastr()->success('Order placed');
            return redirect()->route('orders.details', $this->code);
        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error('Order failed');
        }
    }
}

<div>
    <div class="clear"></div>
    <div class="cart-content columns">
        <div id="item-section" class="two-column border-right">
            <table class="table">
                <tr class="header">
                    <th colspan="3">Order Summary</th>
                </tr>
                @foreach ($cart->items as $key => $item)
                    @php
                        $menu = $cart->menu()[$key];
                    @endphp
                    <tr>
                        <td class="description">
                            {{ $menu->name }}
                        </td>
                        <td class="quantity">
                            x {{ $item['quantity'] }}
                        </td>
                        <td class="text-align-right">{{ App\Helper::toIdr($menu->price - $menu->discount) }}</td>
                    </tr>
                @endforeach
            </table>
            <table class="table summary">
                <tr>
                    <td>Subtotal</td>
                    <td class="text-align-right">{{ App\Helper::toIdr($cart->subtotal) }}</td>
                </tr>
                <tr>
                    <td>Delivery fee</td>
                    <td class="text-align-right">{{ App\Helper::toIdr($cart->delivery_fee) }}</td>
                </tr>
                <tr>
                    <td>Delivery Surcharge</td>
                    <td class="text-align-right">{{ App\Helper::toIdr($cart->delivery_surcharge) }}</td>
                </tr>
                <tr class="grandtotal">
                    <td>TOTAL</td>
                    <td class="text-align-right"><span class="number">{{ App\Helper::toIdr($cart->grand_total) }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <div class="two-column">
            <h2>Deliver To</h2>
            <p>{{ $cart->address }}</p>

            <div class="amount payment_block">
                <div class="promotion_code">
                    <div class="no-promo-code">
                    </div>
                </div>
                <div class="grandtotal_wrapper">
                    <div id="final-price" class="grandtotal final"><span
                            class="number">{{ App\Helper::toIdr($cart->grand_total) }}</span></div>
                </div>
            </div>
            <div class="promo-info"></div>
            <div class="amount" id="payment-method-layout">
                <h2>Pay With</h2>
                <div class="choices">
                    <div class="list">
                        <input type="radio" id="gopay" value="gopay" name="method" wire:model="payment">
                        <label class="choice" for="gopay">
                            <img src="{{ asset('img/tick-orange1x.png') }}" class="tick-orange"
                                srcset="{{ asset('img/tick-orange1x.png') }},
                                    {{ asset('img/tick-orange2x.png') }} 2x" />
                            <img src="{{ asset('img/gopay.png') }}" class="ovo-payment-logo"
                                srcset="{{ asset('img/gopay.png') }},
                                    {{ asset('img/gopay.png') }} 2x">
                        </label>
                    </div>
                </div>
                @error('payment')
                    <div class="validation-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="spacer-top">
                <button type="submit" class="button button-submit order" wire:click="submit">
                    Place My Order
                </button>
            </div>
        </div>
    </div>
</div>

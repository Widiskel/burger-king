<div>
    <div class="clear"></div>
    <form wire:submit.prevent="submit">
        <div class="cart-content">
            <div class="left border-right">
                <table class="table items">
                    <tr class="header">
                        <th colspan="2">Menu Item</th>
                        <th>Quantity</th>
                        <th class="text-align-right">Subtotal</th>
                        <th class="delete"></th>
                    </tr>
                    @forelse ($cart->items as $idx=> $item)
                        @php
                            $menu = $cart->menu()[$idx];
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ $menu->getFirstMedia('menu_image')->getUrl() }}"
                                    class="{{ $menu->name }}" />
                            </td>
                            <td class="description">
                                <div class="description_wrapper">
                                    {{ $menu->name }}
                                </div>
                            </td>
                            <td>
                                <div class="quantity">
                                    <a class="minus" wire:click="minus({{ $idx }})">-</a>
                                    <input type="number" class="item-quantity"
                                        wire:model="cartItem.{{ $idx }}.quantity" />
                                    <a class="plus" wire:click="plus({{ $idx }})">+</a>
                                </div>
                            </td>
                            <td class="text-align-right">
                                <span class='discounted'><span
                                        class="item-subtotal">{{ App\Helper::toIdr($menu->price - $menu->discount) }}</span></span>
                                <span class='original'><span
                                        class="item-subtotal">{{ App\Helper::toIdr($menu->price) }}</span></span>
                            </td>
                            <td align="middle">
                                <a href="#" class="delete" wire:click="removeItem({{$idx}})">
                                    <img src="{{ asset('img/cart-remove1x.png') }}"
                                        srcset="{{ asset('img/cart-remove1x.png') }},
                                                 {{ asset('img/cart-remove2x.png') }} 2x" />
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="3">
                            <div class="continue-wrapper">
                                <a href="{{ route('menus') }}" id="button-continue-shopping"
                                    class="link-shopping">Continue Shopping</a>
                            </div>
                        </td>
                    </tr>
                </table>

                <br />
                <div class="notes-wrapper">
                    <h2>Add Notes</h2>
                    <input type="text" name="notes" class="add-notes" id="input-note"
                        placeholder="Add notes to your order here..." wire:model="cart.notes" wire:change="syncCart" maxlength=30 />
                    <span class="note-char-counter"><span id="note-chars-count">{{strlen($cart->notes)}}</span>/30</span>
                </div>
            </div>
            <div class="right total">
                <h2>Order Subtotal*</h2>
                <div class="grandtotal"><span
                        class="number">{{ App\Helper::toIdr(App\Helper::getCartSummary($cart->items)['grandtotal']) }}</span>
                </div>
                <div class="info">*Price might change due to your delivery location.</div>
                @if (App\Helper::getCartSummary($cart->items)['grandtotal'] == 0)
                    <div class="minimum-transaction">
                        <div class="notes">You must have an order with a minimum of Rp. 0</div>
                        <a href="{{ routes('menus') }}" class="link">Continue Shopping</a>
                    </div>
                @else
                    <div class="button-form" style="display: block;">
                        <button type="submit" class="button">Checkout</button>
                    </div>
                @endif
            </div>
            
        </div>
    </form>
</div>

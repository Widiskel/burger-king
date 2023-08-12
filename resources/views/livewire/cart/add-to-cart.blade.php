<div>
    <div>
        <div class="amount subtotal">
            <div class="grandtotal">
                <span class="discounted">{{App\Helper::toIdr($menu->price - $menu->discount)}}</span>
                <span class="original">{{App\Helper::toIdr($menu->price)}}</span>
            </div>
        </div>
        <table class="info">
            <tr>
                <th>ADD ON</th>
                <td class="selected-modifier">
                    -
                </td>
            </tr>
        </table>
    </div>
    <div class="subtotal-wrapper">
        <div class="amount-mobile">
            <div class="grandtotal">
                <span class="discounted">Rp. </span>
                <span class="original"></span>

            </div>
        </div>

        <div class="action-wrapper">
            <div class="quantity-wrapper">
                <button type="button" class="button-min" id="button-min" wire:click="minus">
                    <img src="{{asset('img/qty-min-1x.png')}}"
                        srcset="{{asset('img/qty-min-1x.png')}},
                                    {{asset('img/qty-min-2x.png')}} 2x" />
                </button>
                <input id="qty" type="number" class="input-qty"  maxlength="2" wire:model="qty"
                    disabled />
                <button type="button" class="button-add" id="button-add" wire:click="plus">
                    <img src="{{asset('img/qty-add-1x.png')}}"
                        srcset="{{asset('img/qty-add-1x.png')}},
                                    {{asset('img/qty-add-2x.png')}} 2x" />
                </button>
            </div>
            <div class="clear"></div>
            @if(auth()->user()->hasRole('Customer'))
                <button id="add-to-cart" type="submit" class="button button-orange" wire:click="addToCart">Add To Cart</button>
            @endif
        </div>
    </div>
</div>
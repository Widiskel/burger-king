<div class="cart-block">
    <a href="#" id="cart" class="cart">
        <span class="badge red hide">-</span>
        <img src="{{ asset('img/cart.png') }}"
            srcset="{{ asset('img/cart.png') }},
                 {{ asset('img/cart_2x.png') }} 2x" />
    </a>
    <div class="cart-data">
        <div class="cart-list">
            <span class="triangle"></span>
            <div class="loading-cart hide">
                <img src="{{ asset('img/loading_cart.gif') }}" />
            </div>
            @guest
                <div class="cart-content-data">
                    <div class="card-content-data-wrapper">
                        <table class="table-floating">
                        </table>
                        <p class="cart-error">Cart is temporarily unavailable.</p>

                    </div>
                </div>
            @endguest
            @auth
                <div class="cart-content-data">
                    <div class="card-content-data-wrapper">
                        <table class="table-floating">
                        </table>
                        <p class="cart-error">Your cart is empty.</p>
                        <a href="/cart/preview" class="button button-order-now">Order Now</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>


<div class="header-block">
    <div class="header-background">
        <div class="header-wrapper">
            <div class="website">
                <a href="/" class="logo">
                    <img src="{{ asset('img/logo_2022.png') }}"
                        srcset="{{ asset('img/logo_2022.png') }},
                             {{ asset('img/logo_2022_2x.png') }} 2x" />
                </a>
                <div class="left-navigation">
                    <div class="group-title">
                        <a href="/menus/">
                            <span class="subtitle">Delivery</span>
                            <span class="title">Order</span>
                        </a>
                    </div>
                    <div class="group-title">
                        <a href="/news-v1/">
                            <span class="subtitle">Get Fresh</span>
                            <span class="title">Promotions</span>
                        </a>
                    </div>
                    <div class="group-title">
                        <a href="/large-orders/">
                            <span class="subtitle">Exclusive</span>
                            <span class="title">Large Order</span>
                        </a>
                    </div>
                </div>
                <div class="right-navigation">
                    <div class="group">
                        <div class="login"><a href="/accounts/login">LOGIN</a></div>
                    </div>
                    <div class="cart-block">
                        <a href="/cart/preview" id="cart" class="cart">
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
                                <p class="cart-error hide">Cart is temporarily unavailable.</p>
                                <div class="cart-content-data">
                                    <div class="card-content-data-wrapper">
                                        <table class="table-floating">
                                        </table>
                                        <p class="cart-error">Your cart is empty.</p>
                                        <a href="/cart/preview" class="button button-order-now">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile">
                <div class="button_container menus" id="toggle">
                    <a href="#">
                        <img src="{{ asset('img/top_menu1x.png') }}"
                            srcset="{{ asset('img/top_menu1x.png') }},
                                     {{ asset('img/top_menu2x.png') }} 2x"
                            class="burger" />
                        <img src="{{ asset('img/close_menu1x.png') }}"
                            srcset="{{ asset('img/close_menu1x.png') }},
                                     {{ asset('img/close_menu2x.png') }} 2x"
                            class="close" />
                    </a>
                </div>

                <div class="overlay" id="overlay">
                    <nav class="overlay-menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/menus/"><span>Delivery</span> Order</a></li>
                            <li><a href="/news-v1/"><span>Get Fresh</span> Promotions</a></li>
                            <li><a href="/large-orders/"><span>Exclusive</span> Large Order</a></li>
                            <li>
                                <hr />
                            </li>
                            <li class="small"><a href="/accounts/login">Login</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="logo_mobile">
                    <a href="/">
                        <img src="{{ asset('img/logo_2022.png') }}"
                            srcset="{{ asset('img/logo_2022.png') }},
                             {{ asset('img/logo_2022_2x.png') }} 2x" />
                    </a>
                </div>
                <div class="right-navigation">
                    <a href="/cart/preview" id="cart" class="cart">
                        <span class="badge red hide">-</span>
                        <img src="{{ asset('img/cart.png') }}"
                            srcset="{{ asset('img/cart.png') }},
                                     {{ asset('img/cart_2x.png') }} 2x" />
                    </a>
                </div>
            </div>
        </div>
        <div class="center message-js hide" id="add-to-cart-popup">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
</div>
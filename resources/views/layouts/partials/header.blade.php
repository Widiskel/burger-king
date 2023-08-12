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
                        <a href="{{route('menus')}}">
                            <span class="subtitle">Delivery</span>
                            <span class="title">Order</span>
                        </a>
                    </div>
                    <div class="group-title">
                        <a href="#">
                            <span class="subtitle">Get Fresh</span>
                            <span class="title">Promotions</span>
                        </a>
                    </div>
                    <div class="group-title">
                        <a href="#">
                            <span class="subtitle">Exclusive</span>
                            <span class="title">Large Order</span>
                        </a>
                    </div>
                </div>
                <div class="right-navigation">
                    @auth
                        <div class="group group-login">
                            <div class="login">
                                <a href="@if(auth()->user()->hasRole('Superadmin')) /dashboard/ @else /orders/ @endif">
                                    <span class="title name-label">
                                        <img class="profile-img"
                                            src="{{asset('img/top-profile1x.png')}}"
                                            srcset="{{asset('img/top-profile1x.png')}} 1x, 
                                            {{asset('img/top-profile2x.png')}} 2x">
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="group">
                            <div class="group-title">
                                <span></span>
                                <span class="title">{{auth()->user()->roles[0]->name}}</span>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="group">
                            <div class="login"><a href="{{ route('login') }}">LOGIN</a></div>
                        </div>
                    @endguest
                    @include('layouts.partials.cart-floating')
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
<a href="#" class="categories-button-close">
    <img src="{{asset('img/menu-close1x.png')}}"
         srcset="{{asset('img/menu-close1x.png')}},
                 {{asset('img/menu-close2x.png')}} 2x" class="close" />
</a>
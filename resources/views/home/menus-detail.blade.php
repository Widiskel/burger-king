@extends('layouts.app')

@section('bodyClass', 'menus')
@section('title','Menus')

@section('content')
    <div class="content-block">
        <div class="content-wrapper">
            @include('home.partials.item-category')
            <div class="columns product-wrapper product-details-content">
                <div class="left border-right">
                    <h1>{{$menu->name}}</h1>
                    <div class="product-description">
                        {{$menu->name}}
                        {{-- 3-Cheese Whopper®Jr + 1pc Ayam Spicy 🌶️ + Nasi + Fries Regular + 2 Coke Regular + Double Choco Pie
                        + Fusion Blueberry --}}
                    </div>
                    <div class="image-wrapper ">
                        <img class="ala-carte-version-only"
                            src="{{ $menu->getFirstMedia('menu_image')->getUrl() }}"
                            alt="{{$menu->name}}" />
                    </div>
                    <div class="clear"></div>
                    <div class="meal-wrapper">
                    </div>
                    <div class="clear"></div>
                    <h2>Sorry, we currently don't have extras</h2>
                    {{-- <h2>Add Extras</h2> --}}
                    {{-- <table class="table extras">
                        <tr class="modifier-row" data-code="Addon 07" data-price="9545.0" data-name="Vanilla Sundae">
                            <td align="center">

                                <img src="https://media-order.bkdelivery.co.id/thumb/product_photo/2023/1/24/l2su3jcrupfrq5m6vwx26c_add_ons.jpg"
                                    class="image" />

                            </td>
                            <td class="desc">
                                <span>Vanilla Sundae</span>
                                <br />
                                Rp 9,545
                            </td>
                            <td class="middle active-modifier hide">
                                <span class="plus-min">
                                    <a href="#" class="deduct-modifier-quantity">
                                        <img src="/static/website/img/qty-min-1x.6c0b66469214.png" />
                                    </a>
                                    <input class="modifier-quantity" type="text" value="0" maxlength="2"
                                        disabled="disabled" />
                                    <a href="#" class="add-modifier-quantity">
                                        <img src="/static/website/img/qty-add-1x.bbe0808224c9.png" />
                                    </a>
                                </span>
                            </td>
                            <td class="middle inactive-modifier">
                                <a href="#" class="circle add-modifier-quantity">
                                    <img src="/static/website/img/qty-add-white-1x.7176768b74ac.png" />
                                </a>
                            </td>
                        </tr>
                    </table> --}}
                </div>
                <div class="right">
                    @livewire('cart.add-to-cart',[$menu])
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@if ($slug == 'preview')
    @section('bodyClass', 'cart_wrapper cart_preview')
    @section('title', 'Cart Preview')
@elseif($slug == 'delivery')
    @section('bodyClass', 'delivery')
    @section('title', 'Delivery')
@elseif($slug == 'payment')
    @section('bodyClass', 'cart_wrapper payment')
    @section('title', 'Payment')
@else
    @section('bodyClass', 'cart_wrapper cart_preview')
    @section('title', 'Cart Preview')
@endif


@section('content')
    <div class="content-block">
        <div class="content-wrapper">
            <div class="step_sections">
                <a href="{{ route('cart', 'preview') }}"
                    class="step @if ($slug == 'preview' || $slug == 'delivery' || $slug == 'payment') active @endif"><span>1</span> <strong
                        class="text">Cart</strong></a>
                <a href="@if($slug != 'delivery' && $slug != 'payment') # @else {{route('cart', 'delivery')}} @endif"
                    class="step @if ($slug == 'delivery' || $slug == 'payment') active @endif"><span>2</span> <strong
                        class="text">Delivery <strong class="dekstop">Info</strong></strong></a>
                <a href="@if($slug != 'payment') # @else {{route('cart', 'payment')}} @endif"
                    class="step @if ($slug == 'payment') active @endif"><span>3</span> <strong
                        class="text">Payment</strong></a>
            </div>
            @if ($slug == 'preview')
                @livewire('cart.cart-preview')
            @elseif($slug == 'delivery')
                @livewire('cart.cart-delivery')
            @elseif($slug == 'payment')
                @livewire('cart.cart-payment')
            @else
                @livewire('cart.cart-preview')
            @endif
        </div>
    </div>
@endsection

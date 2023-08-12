@extends('layouts.app')

@section('bodyClass', 'cart_wrapper payment order-details')
@section('title', 'Orders Details')

@section('content')
    <div class="content-block">
        <div class="content-wrapper">
            <div class="cart-content columns">
                <div class="head">
                    <div class="columns">
                        <h1>PEMBAYARAN</h1>
                        <div class="status">Order akan diproses setelah pembayaran selesai</div>
                        <div class="change-payment-bca">
                            <div>
                                <button class="button" id="btn-process">BAYAR SEKARANG <i class="arrow-right"></i></button>
                            </div>
                            <a href="#" class="change-payment-button" id="btn-process">Ganti
                                Metode Pembayaran</a>
                        </div>
                        <img src="{{ asset('img/City-Bg.jpg') }}"
                            srcset="{{ asset('img/City-Bg.jpg') }},
                                        {{ asset('img/City-Bg.jpg') }} 2x"
                            class="icon-city" />
                    </div>
                </div>


                <div class="left border-right">
                    <h1>ORDER {{ $order->code }}</h1>
                    <p class="info">{{ App\Helper::formatTimeframe($order->created_at) }}</p>
                    <p class="info">Dikirim dari <strong>Mall of Indonesia</strong></p>

                    <div class="payment-notif">
                        <img src="{{ asset('img/selesaikanpembayaran-2x.png') }}">
                        <button class="button button-secondary refresh">Saya Sudah Bayar</button>
                    </div>

                </div>
                <div class="right right-content">
                    <div class="payment-status">
                        <div class="left amount">
                            <h2>PAYMENT TOTAL</h2>
                            <div class="grandtotal">{{ App\Helper::toIdr($order->order_data['grand_total']) }}</div>
                            <p>
                                {{ strtoupper($order->payment_method) }}
                            </p>
                        </div>
                    </div>
                    <h5>ORDER DETAILS</h5>
                    <table class="table items">
                        @foreach ($order->order_data['items'] as $item)
                            @php
                                $menu = App\Models\Menu::find($item['code']);
                            @endphp
                            <tr>
                                <td class="image">
                                </td>
                                <td class="description">
                                    {{$menu->name}}
                                    <div class="modifier">

                                    </div>
                                </td>
                                <td class="quantity">x {{$item['quantity']}}</td>
                                <td class="text-align-right">
                                    {{App\Helper::toIdr($menu->price-$menu->discount)}}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table summary">
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-align-right">{{App\Helper::toIdr($order->order_data['subtotal'])}}</td>
                        </tr>
                        <tr>
                            <td>Delivery fee</td>
                            <td class="text-align-right">{{App\Helper::toIdr($order->order_data['delivery_fee'])}}</td>
                        </tr>

                        <tr>
                            <td>Delivery Surcharge</td>
                            <td class="text-align-right">{{App\Helper::toIdr($order->order_data['delivery_surcharge'])}}</td>
                        </tr>
                        <tr class="grandtotal">
                            <td>TOTAL</td>
                            <td class="text-align-right">{{App\Helper::toIdr($order->order_data['grand_total'])}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>

@endsection

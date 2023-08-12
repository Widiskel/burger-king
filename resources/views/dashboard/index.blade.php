@extends('layouts.admin')

@section('bodyClass', 'menus accounts order_history')
@section('title','Dashboard')

@section('account-main')
    <div class="item-lists">

        <div class="no-order-wrapper">
            <img src="{{ asset('img/empty-order1x.png') }}"
            srcset="{{ asset('img/empty-order1x.png') }},
            {{ asset('img/empty-order2x.png') }} 2x"
                class="no-order" />
                <h2>NO DATA</h2>
        </div>
    </div>
@endsection

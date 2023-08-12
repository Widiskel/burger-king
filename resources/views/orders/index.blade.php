@extends('layouts.customer')

@section('bodyClass', 'menus accounts order_history')
@section('title', 'Orders')

@section('account-main')
    <div class="item-lists">
        @if ($order == null)
            <div class="no-order-wrapper">
                <img src="{{ asset('img/empty-order1x.png') }}"
                    srcset="{{ asset('img/empty-order1x.png') }},
            {{ asset('img/empty-order2x.png') }} 2x"
                    class="no-order" />
                <h2>NO DATA</h2>
            </div>
        @else
            <div class="item-title">Order History</div>
            <table class="table items">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-align-right">Amout</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                    <tr>
                        <td><a href="{{route('orders.details',$item->code)}}">{{$item->code}}</a></td>
                        <td>
                            {{App\Helper::formatTimeframe($item->created_at)}}
                        </td>
                        <td>
                            {{strtoupper($item->payment_method)}}
                        </td>
                        <td class="text-align-right">
                            <span class="dekstop inline">{{App\Helper::toIdr($item->order_data['grand_total'])}}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

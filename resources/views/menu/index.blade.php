@extends('layouts.admin')

@section('bodyClass', 'menus accounts order_history')
@section('title','Menu')

@section('account-main')
    <div class="item-lists">
        @livewire('menu.index')
    </div>
@endsection

@extends('layouts.admin')

@section('bodyClass', 'menus accounts')
@section('title','Menu')

@section('account-main')
    <div class="item-lists">
        @livewire('menu.create')
    </div>
@endsection

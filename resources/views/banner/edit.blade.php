@extends('layouts.admin')

@section('bodyClass', 'menus accounts')
@section('title','Banners')

@section('account-main')
    <div class="item-lists">
        @livewire('banner.edit',[$banner])
    </div>
@endsection

@extends('layouts.admin')

@section('bodyClass', 'menus accounts')
@section('title','Category')

@section('account-main')
    <div class="item-lists">
        @livewire('category.index')
    </div>
@endsection

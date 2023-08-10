@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('account-main')
    <div class="item-lists">
        @livewire('category.index')
    </div>
@endsection

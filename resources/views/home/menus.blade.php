@extends('layouts.app')

@section('bodyClass', 'menus menus-background')
@section('title','Menus')

@section('content')
    <div class="content-block">
        <div class="content-wrapper">
            @include('home.partials.item-category')
            <div class="item-lists">
                <div class="columns menu-box-wrapper">
                    @forelse ($menu as $menuItem)
                    <div class="two-column menu-box">
                        <a href="{{route('menus.detail',["slug"=>$slug,"id"=>$menuItem->id])}}">
                            <div class="image-wrapper">
                                <img src="{{ $menuItem->getFirstMedia('menu_image')->getUrl() }}"
                                    alt="{{$menuItem->category->name}}" />
                            </div>
                            <div class="description">
                                <h4>{{$menuItem->name}}</h4>
                                <div class="directions">
                                    <span class="price discounted">{{App\Helper::toIdr($menuItem->price - $menuItem->discount)}}</span>
                                    <span class="original price">{{App\Helper::toIdr($menuItem->price)}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                        NODATA
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection

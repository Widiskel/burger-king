@extends('layouts.app')

@section('bodyClass', 'index')
@section('title','Welcome')

@section('content')
    @include('layouts.partials.slider')

    <div class="content-block">
        <div class="content-wrapper">
            <div class="wonderful-menus">
                <h2>Our Menus</h2>
            </div>
            <div class="clear"></div>
            <div class="columns menu-box-wrapper">
                @foreach ($menu as $key => $item)
                    <div class="three-column menu-box">
                        <a href="{{route('menus',$item->category->slug)}}">
                            <div class="image-wrapper">
                                <img src="{{ $item->getFirstMedia('menu_image')->getUrl() }}"
                                    alt="{{ $item->category->name }}">
                            </div>
                            <div class="columns wonderful-menus">
                                <div class="two-column">
                                    <h3 class="title">{{ $item->category->name }}</h3>
                                </div>
                                <div class="two-column">
                                    <button class="button button-add">Order</button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                nav: true,
                autoplay: true,
                items: 1,
            });
        });
    </script>
@endpush

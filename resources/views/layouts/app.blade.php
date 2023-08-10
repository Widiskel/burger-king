@php
    $pageForm = [
        'form' => ['login'],
        'menus' => ['dashboard','category.index','category.create'],
    ];
    $pageType = json_decode(json_encode($pageForm), false);
    $routeName = request()->route()->getName();

    $bodyClass = 'index';

    if (in_array($routeName, $pageType->form)) {
        $bodyClass = 'form-page';
    } else {
        if (in_array($routeName, $pageType->menus) || strpos($routeName, 'category.') === 0) {
            $bodyClass = 'menus accounts';
        }

        if (request()->routeIs('dashboard')) {
            $bodyClass .= ' order_history';
        }
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>

    <title>@yield('title') - Burger King</title>

    {{-- @vite(['public/build/assets/app-4e6b2007.css', 'public/build/assets/app-0d91dc04.js']) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    @stack('styles')
</head>
@php
    $body
@endphp
<body
    class="{{$bodyClass}}">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')
</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@livewireScripts
@stack('scripts')

</html>

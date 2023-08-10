@extends('layouts.app')

@section('content')
    <div class="content-block">
        <div class="content-wrapper">
            @include('layouts.partials.admin-aside')
            @yield('account-main')
        </div>
    </div>
@endsection

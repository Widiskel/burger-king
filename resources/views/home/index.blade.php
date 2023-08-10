@extends('layouts.app')

@section('title')
Welcome
@endsection
@section('content')

@include('layouts.partials.slider')

<div class="content-block">
    <div class="content-wrapper">
        <div class="wonderful-menus">
            <h2>Our Menus</h2>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            nav: true,
            autoplay: true,
            items : 1,
        });
    });
</script>
@endpush
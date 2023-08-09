@extends('layouts.app')

@section('content')
    
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
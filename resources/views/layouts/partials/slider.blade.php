@if(!empty($banner))
<div class="slider-block">
    <div class="owl-carousel owl-theme">
        @foreach ($banner as $item)
            <a href="{{$item->link}}" target="_blank">
                <img class="item" src="{{ $item->getFirstMedia('banner_image')->getUrl() }}" />
            </a>
        @endforeach
    </div>
</div>
@endif




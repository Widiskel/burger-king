<div class="item-categories">
    @if (request()->routeIs('menus'))
        <form action='' method='GET'>
            <div class="search">
                <button type="submit" class="search-button"><span class="icon-mglass"></span></button>
                <div class="search-field">
                    <a href="#" class="mobile-search-button"><span class="icon-mglass"></span></a>
                    <input type='text' class="awesomplete" id="search" name='search'
                        placeholder="Search menu...">
                    <a href="#" class="clear-search-button"><span class="icon-search"></span></a>
                </div>
            </div>
        </form>
    @endif
    <a href="#" class="categories-mobile-button">
        @if (request()->slug == null)
            {{ $category[0]->name }}
        @else
            @if ($category->where('slug', request()->slug)->first() != null)
                {{ $category->where('slug', request()->slug)->first()->name }}
            @endif
        @endif
    </a>
    <div class="overlay-category">
        <div class="categories">
            @forelse ($category as $key=> $item)
                <div class="categories-box @if ($item->slug == request()->slug || (request()->slug == null && $key == 0)) active @endif">
                    <div class="text-categories">
                        <a href="{{ route('menus', $item->slug) }}">
                            <h3>
                                {{ $item->name }}
                            </h3>
                        </a>
                    </div>
                </div>
            @empty
                <span>NO DATA</span>
            @endforelse

            <span>* Harga belum termasuk pajak</span>
        </div>

    </div>
</div>

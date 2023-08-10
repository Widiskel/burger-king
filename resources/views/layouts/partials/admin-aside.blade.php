<div class="item-categories">
    <div class="profile">
        <h1>{{ auth()->user()->name }}</h1>
    </div>

    <div class="categories-box @if(request()->routeIs('dashboard')) active @endif">
        <div class="text-categories">
            <a href="{{route('dashboard')}}">
                <h3>
                    Dashboard
                </h3>
            </a>
        </div>
    </div>
    
    <div class="categories-box @if(request()->routeIs('category')) active @endif">
        <div class="text-categories">
            <a href="{{route('category.index')}}">
                <h3>
                    Category
                </h3>
            </a>
        </div>
    </div>

    <div class="categories-box">
        <div class="text-categories">
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <h3>
                        Logout
                    </h3>
                </a>

        </div>
    </div>
</div>
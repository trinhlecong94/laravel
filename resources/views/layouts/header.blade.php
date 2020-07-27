<header class="header">
    <div class="header_overlay"></div>
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo">
            <a href="{{ url('/home') }}">
                <div class="d-flex flex-row align-items-center justify-content-start">
                    <div><img src="{{ url('/images/logo_1.png') }}" alt=""></div>
                    <div>Little Closet</div>
                </div>
            </a>
        </div>
        <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <nav class="main_nav">
            <ul class="d-flex flex-row align-items-start justify-content-start">
                <li><a href="{{ url('/category/1') }}">Women</a></li>
                <li><a href="{{ url('/category/2') }}">Men</a></li>
                <li><a href="{{ url('/category/3') }}">Kids</a></li>
            </ul>
        </nav>
        <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
            <!-- Search -->
            <div class="header_search">
                <form action="{{ url('/search') }}" id="header_search_form">
                    <input type="text" name="searchText" class="search_input" placeholder="Search Item" required="required">
                    <button class="header_search_button"><img src="{{ url('/images/search.png') }}" alt=""></button>
                </form>
            </div>
            <!-- User -->
            <div>
                @auth
                <h4 style="color: #002752">
                    Hi {{ Auth::user()->username }}!
                </h4>
                @endauth
            </div>
            <div class="user">
                @auth
                <a href="{{ url('/account/profile') }}">
                    <div>
                        <img src="{{ url('/images/user.svg') }}" alt="">
                    </div>
                </a>
                @endauth
                @guest
                <a href="{{ url('/login') }}">
                    <div>
                        <img src="{{ url('/images/user.svg') }}" alt="">
                    </div>
                </a>
                @endguest
            </div>
            <!-- Cart -->
            <div class="cart"><a href="{{ url('/cart') }}">
                    <div><img class="svg" src="{{ url('/images/cart.svg') }}" alt="">
                        @if(session('order'))
                        <div>
                            {{ count(session('order')->orderDetails) }}
                        </div>
                        @endif
                    </div>
                </a>
            </div>
            <!-- Phone -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <div>
                    <div><img src="/images/phone.svg" alt=""></div>
                </div>
                <div>+84.774.093.482</div>
            </div>
        </div>
    </div>
</header>
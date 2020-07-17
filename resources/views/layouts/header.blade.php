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
                    <input type="hidden" name="action" value="searchProduct" />
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
                <a href="{{ url('/login') }}">
                    <div>
                        <img src="{{ url('/images/user.svg') }}" alt="">
                    </div>
                </a>
            </div>
           

            <!-- Cart -->
            <div class="cart"><a href="{{ url('/cart') }}">
                    <div><img class="svg" src="{{ url('/images/cart.svg') }}" alt="">

                        <!-- 
                            TO-DO
                        <c:if test="${order!=null}">
                                <div>
                                    ${fn:length(order.orderDetails)}
                                </div>
                            </c:if> 
                        -->

                    </div>
                </a>
            </div>
            <!-- Phone -->
            <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                <div>
                    <div><img src="/images/phone.svg" alt=""></div>
                </div>
                <div>+84 704.555.444</div>
            </div>
        </div>
    </div>
</header>
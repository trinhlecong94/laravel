<div class="menu">

    <!-- Search -->
    <div class="menu_search">
        <form action="{{ url('/search') }}" method="post" id="menu_search_form" class="menu_search_form">
            <input type="hidden" name="action" value="searchProduct" />
            <input type="text" name="searchText" class="search_input" placeholder="Search Item" required="required">
            <button class="menu_search_button"><img src="{{ url('/images/search.png') }}" alt=""></button>
        </form>
    </div>
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            <li><a href="{{ url('/category?id=1&page=1') }}">Women</a></li>
            <li><a href="{{ url('/category?id=2&page=1') }}">Men</a></li>
            <li><a href="{{ url('/category?id=3&page=1') }}">Kids</a></li>
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div>
                <div><img src="{{ url('/images/phone.svg') }}"></div>
            </div>
            <div>+84 704.555.444</div>
        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
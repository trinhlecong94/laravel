@auth
@if(Auth::user()->hasAnyRole(['ROLE_ADMIN','ROLE_USER','ROLE_SELLER']))
<li><a href="{{url('/account/profile')}}">>Account</a></li>
<li><a href="{{url('/account/change-password')}}">>Change Password</a></li>
@endif

@if(Auth::user()->hasAnyRole(['ROLE_ADMIN']))
<li><a href="{{url('/account/my-order')}}">My Order</a></li>
@endif

@if(Auth::user()->hasAnyRole(['ROLE_SELLER']))
<li><a href="{{url('/account/product-manager')}}">>Product</a></li>
<li><a href="{{url('/account/order-manager')}}">Order</a></li>
<li><a href="{{url('/account/promo-manager')}}">>Promotion</a></li>
@endif

@if(Auth::user()->hasAnyRole(['ROLE_ADMIN']))
<li><a href="{{url('/account/account-manager')}}">>Account manager</a> </li>
@endif

<li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        {{ __('>Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
@endauth
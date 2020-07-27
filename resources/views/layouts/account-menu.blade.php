@auth
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/account/profile') }}">
        <i class="fa fa-user-o mr-2" aria-hidden="true"></i>
        {{ __('Account') }}
    </a>
</li>
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/account/change-password') }}">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('Change Password') }}
    </a>
</li>
@if(Auth::user()->hasRole('ROLE_USER'))
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/account/my-order') }}">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('My Order') }}
    </a>
</li>
@endif
@if(Auth::user()->hasRole('ROLE_SELLER'))
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/seller/order-manager') }}">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('Order') }}
    </a>
</li>
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/seller/product-manager') }}">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('Product') }}
    </a>
</li>
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/seller/promo-manager') }}">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('Promotion') }}
    </a>
</li>
@endif
@if(Auth::user()->hasRole('ROLE_ADMIN'))
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ url('/admin/account-manager') }}">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('Account manager') }}
    </a>
</li>
@endif
<li class="nav-item d-inline-flex  align-items-center mr-2">
    <a class="nav-link d-inline-flex" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
@endauth
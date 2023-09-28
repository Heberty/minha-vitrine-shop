<a href="{{ route('cart') }}" class="cart-float predominant-bg"><img src="{{ asset('/images/icon-cart.svg') }}" alt="">
    <span class="cart-float-count">{{ Session::has('cart') ? count(Session::get('cart')) : '0' }}</span>
</a>
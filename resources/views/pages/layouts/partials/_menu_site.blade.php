<ul class="menu-site predominant-bg">
	<li class="menu-site-item"><a class="menu-site-item-link {{ Route::is('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
	<li class="menu-site-item"><a class="menu-site-item-link {{ Route::is('offers') ? 'active' : '' }}" href="{{ route('offers') }}">Ofertas</a></li>
	{{-- <li class="menu-site-item"><a class="menu-site-item-link" href="{{ route('index') }}">Como comprar?</a></li> --}}
	{{-- <li class="menu-site-item"><a class="menu-site-item-link" href="{{ route('about') }}">Conheça-nos</a></li> --}}
	<li class="menu-site-item" style="margin-right: 0;"><a class="menu-site-item-link click-scroll" href="{{ route('index') }}#fale-conosco">Contato</a></li>
	@include('pages.layouts.partials._payment')
</ul>
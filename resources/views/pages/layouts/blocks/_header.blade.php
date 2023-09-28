<header class="header-site predominant-bg">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center">
				@if(isset($setting->image) && !empty($setting->image))
					<a href="{{ route('index') }}" class="logo-site order-1">
						<img src="{{ storageImage('settings', $setting->image) }}" alt="">
					</a>
				@endif
				@include('pages.layouts.partials._search_bar')
				<a href="javascript:;" class="menu-link order-3">
					<img src="{{ asset('images/open-menu.svg') }}" alt="">
				</a>
				<div class="panel order-2">
					<a href="javascript:;" class="menu-link">
						<img src="{{ asset('images/close-menu.svg') }}" alt="">
					</a>
					@include('pages.layouts.partials._menu_site')
					<div class="d-flex d-lg-none justify-content-center">
						@include('pages.layouts.partials._develop_link')
					</div>
				</div>
				<a href="{{ route('cart') }}" class="open-cart order-2 mr-3"><img src="{{ asset('/images/icon-cart.svg') }}" alt="">
					<span class="open-cart-count">{{ Session::has('cart') ? count(Session::get('cart')) : '0' }}</span>
				</a>
			</div>
		</div>
	</div>
</header>
	<div class="category-menu" style="background-color: {{ $setting->secondary_color }}!important;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					{{-- @foreach($types as $key => $type) --}}
					{!! typesList() !!}
					{{-- <ul class="category-menu-list">
						@if($key < 6)
							<li class="category-menu-list-item">
								<a href="{{ route('offers', $type->slug) }}" class="category-menu-list-item-link {{ url()->current() == route('offers', $type->slug) ? 'active' : '' }}">{{ $type->title }}</a>
							</li>
						@endif
					</ul> --}}
					{{-- @endforeach --}}
				</div>
			</div>
		</div>
	</div>

@include('pages.layouts.partials._cart_float')
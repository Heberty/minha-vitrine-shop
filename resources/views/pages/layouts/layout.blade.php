<!DOCTYPE html>
<html>
	@include('pages.layouts.blocks._head')
	@php
		$today = date('Y-m-d');
	@endphp
	@if(strtotime($today) >= strtotime($setting->date_end) && $setting->active_trial == 1)
	@include('pages.layouts.sections._section_trial')
	@else
		@if(Route::is('index'))
			@if($setting->active_linkme)

			@php
				// dd($_SERVER);
			@endphp
				@include('pages.layouts.partials._welcome')
			@endif
		@endif
		@if($setting->active_vitrine)
			<body id="home">
				@if(isset($setting->tagmanager) && !empty($setting->tagmanager))
					<!-- Google Tag Manager (noscript) -->
					<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $setting->tagmanager }}"
					height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
					<!-- End Google Tag Manager (noscript) -->
				@endif

				@include('pages.layouts.partials._selos_networks')
				@include('pages.layouts.blocks._header')
				
				<div class="content">
					@yield('content')

					{{-- @include('pages.layouts.sections._section_brands') --}}
					@if(route::is('cart'))
						{{-- @include('pages.layouts.sections._section_contact') --}}
					@endif

					@include('pages.layouts.sections._section_payment')

					@include('pages.layouts.sections._section_information')
				</div>
				
				@include('pages.layouts.blocks._footer')
				@include('pages.layouts.blocks._scripts')
			</body>
		@endif
	@endif
</html>
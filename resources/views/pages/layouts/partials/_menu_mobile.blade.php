<div class="menu-mobile predominant-bg">
	<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp) }}&text={{ $setting->whatsapp_message }}" class="btn-site btn-sale " target="_blank">Comprar <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
	<ul class="list-buttons-mobile">
		@if(isset($setting->facebook) && !empty($setting->facebook))
			<li class="list-buttons-mobile-item">
				<a href="http://facebook.com/{{ $setting->facebook }}" class="list-buttons-mobile-item-link" target="_blank">
					<img src="{{ asset('images/icon-facebook.svg') }}" alt="" class="list-buttons-mobile-item-link-icon">
				</a>
			</li>
		@endif
		@if(isset($setting->instagram) && !empty($setting->instagram))
			<li class="list-buttons-mobile-item">
				<a href="http://instagram.com/{{ $setting->instagram }}" class="list-buttons-mobile-item-link" target="_blank">
					<img src="{{ asset('images/icon-instagram.svg') }}" alt="" class="list-buttons-mobile-item-link-icon">
				</a>
			</li>
		@endif
		<li class="list-buttons-mobile-item">
			<a href="{{ route('index') }}#home" class="list-buttons-mobile-item-link click-scroll">
				<img src="{{ asset('images/icon-home.svg') }}" alt="" class="list-buttons-mobile-item-link-icon">
			</a>
		</li>
	</ul>
</div>
<ul class="selos-networks">
	@if(isset($setting->whatsapp) && !empty($setting->whatsapp))
		<li class="selos-networks-item">
			<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp) }}&text={{ $setting->whatsapp_message }}" class="selos-networks-item-link whatsapp" target="_blank">
				<img src="{{ asset('images/icon-whatsapp.svg') }}" alt="" class="selos-networks-item-link-icon">
				<p class="selos-networks-item-link-text">Compre pelo <br> Whatsapp</p>
			</a>
		</li>
	@endif
	@if(isset($setting->facebook) && !empty($setting->facebook))
		<li class="selos-networks-item">
			<a href="http://facebook.com/{{ $setting->facebook }}" class="selos-networks-item-link facebook" target="_blank">
				<img src="{{ asset('images/icon-facebook.svg') }}" alt="" class="selos-networks-item-link-icon">
				<p class="selos-networks-item-link-text">{{ '/' . $setting->facebook }}</p>
			</a>
		</li>
	@endif
	@if(isset($setting->instagram) && !empty($setting->instagram))
		<li class="selos-networks-item">
			<a href="http://instagram.com/{{ $setting->instagram }}" class="selos-networks-item-link instagram" target="_blank">
				<img src="{{ asset('images/icon-instagram.svg') }}" alt="" class="selos-networks-item-link-icon">
				<p class="selos-networks-item-link-text">{{ '@' . $setting->instagram }}</p>
			</a>
		</li>
	@endif
</ul>
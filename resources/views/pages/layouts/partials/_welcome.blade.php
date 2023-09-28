<div class="welcome" id="welcome">
	<div class="welcome-body predominant-bg">
		<div class="mt-auto mb-auto">
			<a href="{{ route('index') }}" class="logo-welcome">
				<img src="{{ storageImage('settings', $setting->image) }}" alt="">
			</a>
			<h1 class="title-welcome">Seja <span>Bem Vindo</span></h1>
			<div class="text-welcome">
				<p>Escolha entre as opções abaixo para continuar o atendimento</p>
			</div>
		</div>
		<div class="amount-buttons">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="row justify-content-center">
							@if($setting->active_vitrine)
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="javascript:;" class="btn-site btn-sale btn-close close-welcome button-color" id="{{ Str::slug($setting->title_site, '-') }}" onclick="setEvent('{{ Str::slug($setting->title_site, '-') }}', 'minha_vitrine')">Vitrine<img src="{{ asset('images/icon-sale.svg') }}" alt=""></a>
										<small class="text-btn-welcome">{{ $setting->title_site }}</small>
									</div>
								</div>
							@endif
							<div class="col-6">
								<div class="d-flex flex-column mb10">
									<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp) }}&text={{ $setting->whatsapp_message }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_whatsapp }} <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
									<small class="text-btn-welcome">{{ $setting->whatsapp }}</small>
								</div>
							</div>
							@if(isset($setting->whatsapp_02) && !empty($setting->whatsapp_02))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp_02) }}&text={{ $setting->whatsapp_message . ' ' . $setting->title_whatsapp_02 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_whatsapp_02 }} <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
										<small class="text-btn-welcome">{{ $setting->whatsapp_02 }}</small>
									</div>
								</div>
							@endif
							@if(isset($setting->whatsapp_03) && !empty($setting->whatsapp_03))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp_03) }}&text={{ $setting->whatsapp_message . ' ' . $setting->title_whatsapp_03 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_whatsapp_03 }} <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
										<small class="text-btn-welcome">{{ $setting->whatsapp_03 }}</small>
									</div>
								</div>
							@endif
							@if(isset($setting->whatsapp_04) && !empty($setting->whatsapp_04))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp_04) }}&text={{ $setting->whatsapp_message . ' ' . $setting->title_whatsapp_04 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_whatsapp_04 }} <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
										<small class="text-btn-welcome">{{ $setting->whatsapp_04 }}</small>
									</div>
								</div>
							@endif
							@if(isset($setting->whatsapp_05) && !empty($setting->whatsapp_05))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp_05) }}&text={{ $setting->whatsapp_message . ' ' . $setting->title_whatsapp_05 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_whatsapp_05 }} <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
										<small class="text-btn-welcome">{{ $setting->whatsapp_05 }}</small>
									</div>
								</div>
							@endif
							@if(isset($setting->link_01) && !empty($setting->link_01))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="{{ $setting->link_01 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_link_01 }} 
											@if(strpos($setting->link_01, 'youtube'))
												<img src="{{ asset('images/icon-youtube.svg') }}" alt="">
											@else
												<img src="{{ asset('images/icon-globo.svg') }}" alt="">
											@endif
										</a>
										<small class="text-btn-welcome">Acesse</small>
									</div>
								</div>
							@endif
							@if(isset($setting->link_02) && !empty($setting->link_02))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="{{ $setting->link_02 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_link_02 }} 
											@if(strpos($setting->link_02, 'youtube'))
												<img src="{{ asset('images/icon-youtube.svg') }}" alt="">
											@else
												<img src="{{ asset('images/icon-globo.svg') }}" alt="">
											@endif
										</a>
										<small class="text-btn-welcome">Acesse</small>
									</div>
								</div>
							@endif
							@if(isset($setting->link_03) && !empty($setting->link_03))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="{{ $setting->link_03 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_link_03 }} 
											@if(strpos($setting->link_03, 'youtube'))
												<img src="{{ asset('images/icon-youtube.svg') }}" alt="">
											@else
												<img src="{{ asset('images/icon-globo.svg') }}" alt="">
											@endif
										</a>
										<small class="text-btn-welcome">Acesse</small>
									</div>
								</div>
							@endif
							@if(isset($setting->link_04) && !empty($setting->link_04))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="{{ $setting->link_04 }}" class="btn-site btn-sale button-color" target="_blank">{{ $setting->title_link_04 }} 
											@if(strpos($setting->link_04, 'youtube'))
												<img src="{{ asset('images/icon-youtube.svg') }}" alt="">
											@else
												<img src="{{ asset('images/icon-globo.svg') }}" alt="">
											@endif
										</a>
										<small class="text-btn-welcome">Acesse</small>
									</div>
								</div>
							@endif
							@if(isset($setting->link_05) && !empty($setting->link_05))
								<div class="col-6">
									<div class="d-flex flex-column mb10">
										<a href="{{ $setting->link_05 }}" class="btn-site btn-sale button-color">{{ $setting->title_link_05 }} 
											@if(strpos($setting->link_05, 'youtube'))
												<img src="{{ asset('images/icon-youtube.svg') }}" alt="">
											@else
												<img src="{{ asset('images/icon-globo.svg') }}" alt="" target="_blank">
											@endif
										</a>
										<small class="text-btn-welcome">Acesse</small>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-4 col-lg-2 d-flex justify-content-center">
					<ul class="network-welcome">
						@if(isset($setting->facebook) && !empty($setting->facebook))
							<li class="network-welcome-item">
								<a href="https://www.facebook.com{{ $setting->facebook }}" class="network-welcome-item-link" title="Facebook" target="_blank">
									<i class="fa fa-facebook-square" aria-hidden="true"></i>
								</a>
							</li>
						@endif
						@if(isset($setting->instagram) && !empty($setting->instagram))
							<li class="network-welcome-item">
								<a href="https://www.instagram.com{{ $setting->instagram }}" class="network-welcome-item-link" title="Instagram" target="_blank">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						@endif
						@if(isset($setting->phone) && !empty($setting->phone))
							<li class="network-welcome-item">
								<a href="tel:{{ $setting->phone }}" class="network-welcome-item-link" title="Telefone" target="_blank">
									<i class="fa fa-phone-square" aria-hidden="true"></i>
								</a>
							</li>
						@endif
						@if(isset($setting->adress) && !empty($setting->adress))
							<li class="network-welcome-item">
								<a href="https://maps.google.com/?q={{ $setting->adress }}" class="network-welcome-item-link" title="Endereço" target="_blank">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</a>
							</li>
						@endif
						@if(isset($setting->email) && !empty($setting->email))
							<li class="network-welcome-item">
								<a href="mailto:{{ $setting->email }}" class="network-welcome-item-link" title="E-mail" target="_blank">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</a>
							</li>
						@endif
					</ul>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 co-sm-4">
					<div class="footer-welcome">
						@if(isset($setting->title_site) && !empty($setting->title_site))
							<strong class="footer-welcome-title">{{ $setting->title_site }}</strong>
						@endif
						@if(isset($setting->adress) && !empty($setting->adress))
							<p class="footer-welcome-adress">{{ $setting->adress }}</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('pages.layouts.partials._develop_link')
</div>

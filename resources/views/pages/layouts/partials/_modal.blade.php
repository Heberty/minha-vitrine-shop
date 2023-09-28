<div class="modal fade" id="{{ Str::slug($product->title, '') . '-' . Str::slug($product->brand, '') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="product-card-modal {{ $product->amount == 0 ? 'sold-off' : '' }}">
					@if(pathinfo($product->image, PATHINFO_EXTENSION) == 'png')
						<a href="{{ $product->product() }}" data-fancybox="produtos-{{ Str::slug($product->title, '-') }}"><img src="{{ $product->product() }}" alt="" class="product-card-modal-image"></a>
					@else
						<a href="{{ $product->product() }}" data-fancybox="produtos-{{ Str::slug($product->title, '-') }}" class="product-card-modal-image-hidden d-block" style="background-image: url({{ $product->product() }})"></a>
					@endif
					<div class="product-card-modal-body">
						<strong class="product-card-modal-body-title predominant-color">{{ $product->title }} - {{ $product->brand }}</strong>
						{{-- <p class="product-card-modal-body-brand">{{ $type->title }}</p> --}}
						<div class="text-area">
							{!! $product->description !!}
						</div>
						<ul class="product-card-modal-list-seal">
							@if($product->amount == 0)
								<li class="product-card-modal-list-seal-item restam-apenas">Esgo<br class="d-none d-lg-inline-block">tado</li>
							@elseif($product->amount == 1)
								<li class="product-card-modal-list-seal-item restam-apenas">Resta {{ $product->amount }}</li>
							@elseif($product->amount <= 3)
								<li class="product-card-modal-list-seal-item restam-apenas">Restam {{ $product->amount }}</li>
							@endif
							@if($product->delivery_free)
								<li class="product-card-modal-list-seal-item entrega-gratis">Entrega Grátis***</li>
							@endif
							@if($product->super_offer)
								<li class="product-card-modal-list-seal-item super-oferta">Super Oferta</li>
							@endif
							@if($product->promotion)
								<li class="product-card-modal-list-seal-item promocao">Prom<br class="d-none d-lg-inline-block">oção</li>
							@endif
						</ul>
						<div class="owl-carousel gallery-carousel">
							@forelse($product->gallery as $image)
							<a href="{{ storageImage('galleries', $image->name) }}" class="gallery-item" data-fancybox="{{ Str::slug($product->title, '-') }}" style="background-image: url('{{ storageImage('galleries', $image->name) }}')"></a>
							@empty
							@endforelse
						</div>
						<div class="product-card-modal-body-value">
							<sup>R$</sup>
							<h1>{{ formatPrice($product->money) }}
						</div>
						<small class="product-card-modal-body-asterisk">*{{ $product->text_legal ? $product->text_legal : '*Consulte condições' }}</small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				@if($product->amount == 0)
					<a href="javascript:;" class="btn-site btn-sale" style="color: {{ $setting->button_color }}!important;">Esgotado</a>
				@else
					<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp) }}&text=Oi%2C%20quero%20comprar%20este(a)%20{{ $product->title}}%20que%20est%C3%A1%20custando%20R${{ number_format($product->money, 2, ',', '.') }}%20{{ $product->text_legal ? strtolower($product->text_legal) : ''}}" class="btn-site btn-sale button-color" target="_blank" id="{{ 'whatsapp_' . Str::slug($product->title, '-') . '-modal' }}" onclick="setEvent('{{ 'modal_whatsapp_' . Str::slug($setting->title_site, '-') }}', 'botao_fixo')">Comprar <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
				@endif
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
</div>

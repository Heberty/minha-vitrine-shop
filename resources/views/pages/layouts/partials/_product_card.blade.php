<div class="product-card {{ $product->amount == 0 ? 'sold-off' : '' }}">
	{{-- <div class="selo-15"><img src="{{ asset('images/selo_10.png') }}" alt=""></div> --}}
	@if(pathinfo($product->image, PATHINFO_EXTENSION) == 'png')
		<a href="{{ $product->amount == 0 ? 'javascript:;' : route('offer', $product->slug) }}"><img src="{{ $product->product() }}" alt="" class="product-card-image"></a>
	@else
		<a href="{{ $product->amount == 0 ? 'javascript:;' : route('offer', $product->slug) }}" class="product-card-image-hidden d-block" style="background-image: url({{ $product->product() }})"></a>
	@endif
	<div class="product-card-body">
		<a href="{{ $product->amount == 0 ? 'javascript:;' : route('offer', $product->slug) }}" class="product-card-body-title predominant-color">{{ $product->title }}</a>
		<p class="product-card-body-brand">{{ $product->brand }}</p>
		<div class="product-card-body-value">
			<sup>R$</sup>
			<h1>{{ formatPrice($product->price) }}
		</div>
		<small class="product-card-body-asterisk">*{{ $product->text_legal ? $product->text_legal : '*Consulte condições' }}</small>
		<ul class="product-card-list-seal">
			@if($product->amount == 0)
				<li class="product-card-list-seal-item restam-apenas">Esgo<br class="d-none d-lg-inline-block">tado</li>
			@elseif($product->amount == 1)
				<li class="product-card-list-seal-item restam-apenas">Resta {{ $product->amount }}</li>
			@elseif($product->amount <= 3)
				<li class="product-card-list-seal-item restam-apenas">Restam {{ $product->amount }}</li>
			@endif
			@if($product->delivery_free)
				<li class="product-card-list-seal-item entrega-gratis">Entrega Grátis***</li>
			@endif
			@if($product->super_offer)
				<li class="product-card-list-seal-item super-oferta">Super Oferta</li>
			@endif
			@if($product->promotion)
				<li class="product-card-list-seal-item promocao">Promoção</li>
			@endif
		</ul>
		<div class="d-flex justify-content-center">
			@if($product->amount == 0)
				<a href="javascript:;" class="btn-site btn-sale button-color">Esgotado</a>
			@else
				<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp) }}&text=Oi%2C%20quero%20comprar%20este(a)%20{{ $product->title}}%20-%20{{ $product->brand }}%20que%20est%C3%A1%20custando%20R${{ number_format($product->price, 2, ',', '.') }}%20{{ $product->text_legal ? strtolower($product->text_legal) : ''}}%20|%20Link%20da%20imagem:%20{{ $product->product() }}" class="btn-site btn-sale button-color" target="_blank" id="{{ 'whatsapp_' . Str::slug($product->title, '-') }}" onclick="setEvent('{{ 'whatsapp_' . Str::slug($product->title, '-') }}', 'botao_fixo')">Comprar <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
			@endif
		</div>
		{{-- <a href="{{ route('offer', $product->slug) }}" class="product-card-body-details">
			<small>Ver mais <span class="d-none d-lg-inline">detalhes sobre o produto</span></small>
		</a> --}}
		{{-- <a href="javascript:;" class="product-card-body-details">
			<small>Ver mais <span class="d-none d-lg-inline">detalhes sobre o produto</span></small>
		</a> --}}
		{{-- <a href="javascript:;" class="product-card-body-details {{ $product->amount == 0 ? 'd-none' : '' }}" data-toggle="modal" data-target="#{{ Str::slug($product->title, '') . '-' . Str::slug($product->brand, '') }}">
			<small>Ver mais <span class="d-none d-lg-inline">detalhes sobre o produto</span></small>
		</a> --}}
		<div class="d-flex align-items-center">
			<a class="product-card-body-details predominant-bg mr-1" href="{{ $product->amount == 0 ? 'javascript:;' : route('offer', $product->slug) }}"><img src="{{ asset('images/add.svg') }}" alt=""> Detalhes</a>
			<a class="btn-cart" href="{{ route('add.cart', $product) }}">
				<img src="{{ asset('images/icon-cart-add.svg') }}" alt="" class="btn-cart-icon">
				<img src="{{ asset('images/icon-cart-add-white.svg') }}" alt="" class="btn-cart-icon-hidden">
				Adicionar
			</a>
		</div>
	</div>
</div>

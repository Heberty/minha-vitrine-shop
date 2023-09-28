<div itemscope itemtype="http://schema.org/Product">
  <meta itemprop="brand" content="{{ $product->brand }}">
  <meta itemprop="name" content="{{ $product->title . '-' . $product->brand }}">
  <meta itemprop="description" content="{{ $product->decription }}">
  <meta itemprop="productID" content="{{ $product->slug . '-' . $product->id }}">
  <meta itemprop="url" content="{{ route('offer', $product->slug) }}">
  <meta itemprop="image" content="{{ $product->product() }}">
  {{-- <div itemprop="value" itemscope itemtype="http://schema.org/PropertyValue">
    <span itemprop="name">{{ $product->type->slug }}-{{ $product->id }}</span>
    <meta itemprop="value" content="True">{{ $product->type->title }}</meta>
  </div> --}}
  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <link itemprop="availability" href="in stock">
    <link itemprop="itemCondition" href="new">
    <meta itemprop="price" content="{{ formatPrice($product->price) }}">
    <meta itemprop="priceCurrency" content="BRL">
  </div>
</div>

<section class="section-offer" id="ofertas">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="product-card-inner {{ $product->amount == 0 ? 'sold-off' : '' }}">
					<div class="row">
						<div class="col-12 col-lg-7">
							<div class="product-card-inner-left">
								<div class="row">
									<div class="col-12 col-lg-6">
										<div class="owl-carousel gallery-carousel-inner">
											<a href="{{ $product->product() }}" data-fancybox="produtos" class="product-card-inner-gallery d-block" style="background-image: url({{ $product->product() }})"></a>
											@forelse($product->gallery as $image)
											<a href="{{ storageImage('galleries', $image->name) }}" class="product-card-inner-gallery" data-fancybox="{{ Str::slug($product->title, '-') }}" style="background-image: url('{{ storageImage('galleries', $image->name) }}')"></a>
											@empty
											@endforelse
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="d-flex">
											<div class="product-card-inner-body-box-title">
												<small class="product-card-inner-body-asterisk mb10 d-flex align-items-center">
													@php  
			  
													session_start(); 
													   
													if(isset($_SESSION['views'])) 
													    $_SESSION['views'] = $_SESSION['views']+1; 
													else
													    $_SESSION['views']=1; 
													      
													echo 'Novo | ' . $_SESSION['views'] . ' Vendidos'; 
													  
													@endphp
												</small>
												<strong class="product-card-inner-body-title predominant-color">{{ $product->title }}</strong> 
												<p class="product-card-inner-body-brand">{{ $product->brand }}</p>
												<div class="product-card-inner-category-box">
													<span class="product-card-inner-category-box-title">Categoria:</span>
													<a href="{{ route('offers', $product->type->slug) }}" class="product-card-inner-category-box-name predominant-bg">{{ $product->type->title }}</a>
												</div>
												@if(!empty($product->description))
													<a href="#mais-informacoes" class="more-info click-scroll">+ Mais informações</a>
												@endif
												<div class="form-group">
													<a class="btn-cart" href="{{ route('add.cart', $product) }}">
														<img src="{{ asset('images/icon-cart-add.svg') }}" alt="" class="btn-cart-icon">
														<img src="{{ asset('images/icon-cart-add-white.svg') }}" alt="" class="btn-cart-icon-hidden">
														Adicionar ao carrinho
													</a>
												</div>
											</div>
										</div>
										<div class="share">
											<div class="fb-share-button mt20 mb10" data-href="{{ route('offer', $product->slug) }}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
											<a href="" class="share-whatsapp" id="whatsapp-share-btt" rel="nofollow" target="_blank"><img src="{{ asset('images/icon-whatsapp.svg') }}" alt="">Compartilhar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="product-card-inner-diviser"></div>
						<div class="col-12 col-lg-5">
							<div class="product-card-inner-right">
								<div class="product-card-inner-body">
									<ul class="product-card-inner-list-seal">
										@if($product->amount == 0)
											<li class="product-card-inner-list-seal-item restam-apenas">Esgo<br class="d-none d-lg-inline-block">tado</li>
										@elseif($product->amount == 1)
											<li class="product-card-inner-list-seal-item restam-apenas">Resta {{ $product->amount }}</li>
										@elseif($product->amount <= 3)
											<li class="product-card-inner-list-seal-item restam-apenas">Restam {{ $product->amount }}</li>
										@endif
										@if($product->delivery_free)
											<li class="product-card-inner-list-seal-item entrega-gratis">Entrega Grátis***</li>
										@endif
										@if($product->super_offer)
											<li class="product-card-inner-list-seal-item super-oferta">Super Oferta</li>
										@endif
										@if($product->promotion)
											<li class="product-card-inner-list-seal-item promocao">Promoção</li>
										@endif
									</ul>
									@if($product->amount != 0)
										<small class="product-card-inner-body-asterisk mb10 d-flex align-items-center">
											<span class="product-card-inner-body-amount predominant-bg">{{ $product->amount }}</span>
											Em estoque
										</small>
									@endif
									<div class="product-card-inner-body-value">
										<sup>R$</sup>
										<h1>{{ formatPrice($product->price) }}</h1>
									</div>
									<small class="product-card-inner-body-asterisk mb20">*{{ $product->text_legal ? $product->text_legal : '*Consulte condições' }}</small>
									<div class="d-flex justify-content-center">
										@if($product->amount == 0)
											<a href="javascript:;" class="btn-site btn-sale mb20" style="color: {{ $setting->button_color }}!important;">Esgotado</a>
										@else
											<a href="https://api.whatsapp.com/send?phone=550{{ formatNumber($setting->whatsapp) }}&text=Oi%2C%20quero%20comprar%20este(a)%20{{ $product->title}}%20-%20{{ $product->brand }}%20que%20est%C3%A1%20custando%20R${{ number_format($product->price, 2, ',', '.') }}%20{{ $product->text_legal ? strtolower($product->text_legal) : ''}}%20|%20Link%20da%20imagem:%20{{ $product->product() }}" class="btn-site btn-sale button-color mb20" target="_blank" id="{{ 'whatsapp_' . Str::slug($product->title, '-') }}" onclick="setEvent('{{ 'whatsapp_' . Str::slug($product->title, '-') }}', 'botao_fixo')">Comprar <img src="{{ asset('images/icon-whatsapp.svg') }}" alt=""></a>
										@endif
									</div>
									@include('pages.layouts.partials._security_sales')
								</div>
								@include('pages.layouts.partials._payment')
								<div class="product-card-inner-body-text-legal mt20">{!! $setting->text_legal !!}</div>
							</div>
						</div>
						@if(!empty($product->description) && isset($product->description))
						<div class="product-card-inner-diviser"></div>
						<div class="col-12" id="mais-informacoes">
							<div class="product-card-inner-right product-card-inner-bottom">
								<h4 class="title-description predominant-color">Descrição</h4>
								<div class="text-area text-left mb20">
									{!! $product->description !!}
								</div>
							</div>
						</div>
						@endif
						@if(!empty($product->video) && isset($product->video))
						<div class="product-card-inner-diviser"></div>
						<div class="col-12">
							<div class="product-card-inner-right product-card-inner-bottom">
								<h4 class="title-description predominant-color">Vídeo</h4>
								<a href="https://www.youtube.com/watch?v={{ $product->video }}" class="video-product" style="background-image: url('https://img.youtube.com/vi/<{{ $product->video }}/hqdefault.jpg')" data-fancybox="video"></a>								
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-offers" id="ofertas">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<div class="title-section-box">
					<h1 class="title-section">
						Ofertas <span style="color: {{ $setting->predominant_color }}!important;">{{ $setting->title_site }}</span>
					</h1>
					<p class="title-section-description">Temos o que há de melhor para você, clique em comprar e logo entraremos em contato.</p>
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($products as $product)
				<div class="col-6 col-lg-4">
					@include('pages.layouts.partials._product_card')
				</div>
			@endforeach
			@if(Route::is('index'))
				<div class="col-12">
					<div class="d-flex justify-content-center mt60">
						<a href="{{ route('offers') }}" class="btn-site btn-large predominant-bg">Ver todas</a>
					</div>
				</div>
			@elseif(Route::is('offers', null))
				<div class="col-12 d-flex justify-content-center mt70 mb70">
					{!! $products->appends(request()->input())->links() !!}
				</div>
			@endif
		</div>
	</div>
</section>
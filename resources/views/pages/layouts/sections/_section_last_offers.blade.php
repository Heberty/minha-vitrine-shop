<section class="section-last-offers">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<div class="title-section-box">
					<h1 class="title-section">
						Pessoas como você <span style="color: {{ $setting->predominant_color }}!important;">Também pesquisaram</span>
					</h1>
					<p class="title-section-description">Veja aqui mais ofertas que possam lhe interessar</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="owl-carousel" id="last-offers-carousel">
					@foreach($products as $product)
						@include('pages.layouts.partials._product_card')
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-payment" id="pagamentos">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<ul class="menu-footer">
					<li class="menu-footer-item">
						<strong class="menu-footer-item-title predominant-color">Insitucional</strong>
					</li>
					<li class="menu-footer-item">
						<a href="" class="menu-footer-item-link">Empresa</a>
					</li>
					<li class="menu-footer-item">
						<a href="" class="menu-footer-item-link">Como comprar?</a>
					</li>
					<li class="menu-footer-item">
						<a href="" class="menu-footer-item-link">Entrega grátis</a>
					</li>
					<li class="menu-footer-item">
						<a href="" class="menu-footer-item-link">Garantia</a>
					</li>
					<li class="menu-footer-item">
						<a href="" class="menu-footer-item-link">Fale conosco</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-3">
				@include('pages.layouts.partials._payment')
			</div>
			<div class="col-lg-7">
				<div class="text-legal">
					{!! $setting->text_legal !!} 
				</div>
			</div>
		</div>
	</div>
</section>
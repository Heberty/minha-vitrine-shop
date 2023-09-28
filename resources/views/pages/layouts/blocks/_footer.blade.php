<footer class="footer-site">
	<div class="container">
		<div class="row">
			<div class="col-12">
				@include('pages.layouts.partials._develop_link')
			</div>
		</div>
	</div>
</footer>

@include('pages.layouts.partials._menu_mobile')

@foreach($products as $product)
	@include('pages.layouts.partials._modal')
@endforeach
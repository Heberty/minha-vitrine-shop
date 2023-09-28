<form action="{{ route('products.search') }}" class="search-bar order-2" method="get">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Pesquise aqui!" name="filter">
		<button type="submit" class="btn-search"><img src="{{ asset('images/icon-search.svg') }}" alt=""></button>
	</div>
</form>
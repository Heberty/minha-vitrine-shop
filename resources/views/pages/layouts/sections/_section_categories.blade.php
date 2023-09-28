<section class="section-categories">
	<div class="container">
		<div class="row">
			<ul class="list-categories">
				<li class="list-categories-item {{ route('offers') == url()->current() ? 'active' : '' }}">
					<a href="{{ route('offers') }}" class="list-categories-item-link">Todas</a>
				</li>
				@foreach($types as $type)
					<li class="list-categories-item {{ route('offers', $type->slug) == url()->current() ? 'active' : '' }}">
						<a href="{{ route('offers', $type->slug) }}" class="list-categories-item-link">{{ $type->title }}</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</section>
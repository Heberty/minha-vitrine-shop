<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{asset('/js/sweetalert2.min.js') }}"></script>
<script>
	$.fancybox.defaults.hash = false;

    function setEvent(whatsapp, botao_fixo){
        ga('send', 'event', whatsapp, botao_fixo);
    }
</script>

@if(Route::is('offer'))
	<script type="application/ld+json">
	{
	  "@context":"https://schema.org",
	  "@type":"Product",
	  "productID":"{{ $product->slug . '-' . $product->id }}",
	  "name":"{{ $product->title }} - {{ $product->brand }}",
	  "description":"{!! $product->description !!}",
	  "url":"{{ route('offer', $product->slug) }}",
	  "image":"{{ $product->product() }}",
	  "brand":"{{ $product->brand }}",
	  "offers": [
	    {
	      "@type": "Offer",
	      "price": "{{ formatPrice($product->price) }}",
	      "priceCurrency": "BRL",
	      "itemCondition": "new",
	      "availability": "in stock"
	    }
	  ],
	  "additionalProperty": [{
	    "@type": "PropertyValue",
	    "propertyID": "{{ $product->type->slug . '-' . $product->id }}",
	    "value": "{{ $product->type->slug }}"
	  }]
	}
	</script>
@endif

{{-- SE NECESSÁRIO UTILIZAR UM JS ESPECÍFICO PARA ALGUMA PÁGINA --}}
@yield('js')
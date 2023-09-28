<section class="section-cart" id="carrinho">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<div class="title-section-box">
					<h1 class="title-section">
						Carrinho <span style="color: {{ $setting->predominant_color }}!important;">de compras</span>
					</h1>
					<p class="title-section-description">Aqui abaixo estão os produtos de seu carrinho</p>
				</div>
			</div>
            <div class="col-12 col-lg-8">
                <ul class="list-cart">
                    @if(Session::has('cart') && !empty($carts))
                        @foreach($carts as $cart)
                            @foreach($cart as $value)
                            <li class="list-cart-item">
                                <div class="list-cart-item-body">
                                    <div class="list-cart-item-body-image">
                                        <a href="{{ route('offer', $value->slug) }}">
                                            <img src="{{ asset('storage/products/' . $value->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="list-cart-item-body-text">
                                        <a href="{{ route('offer', $value->slug) }}">
                                            <h2 class="list-cart-item-body-text-title predominant-color">{{ $value->title }}</h2>
                                            <h3 class="list-cart-item-body-text-brand">{{ $value->brand }}</h3>
                                        </a>
                                    </div>
                                    <div class="list-cart-item-body-value">
                                        <h3 class="list-cart-item-body-value-title predominant-color">Preço</h3>
                                        <strong class="list-cart-item-body-value-price">{{ 'R$' . formatPrice($value->price) }}</strong>
                                    </div>
                                    <div class="list-cart-item-body-amount">
                                        <h3 class="list-cart-item-body-amount-label predominant-color">Quantidade</h3>
                                        <select name="amount-{{ $value->id }}" id="amount-{{ $value->id }}" class="list-cart-item-body-amount-count" form="formCart" disabled>
                                            @for($i=1; $i<10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="list-cart-item-action">
                                    <a href="{{ route('delete.cart', $value->id) }}" class="list-cart-item-action-delete predominant-bg"><img src="{{ asset('images/icon-delete.svg') }}" alt="" class="list-cart-item-body-action-delete-icon"></a>
                                </div>
                            </li>
                            @endforeach
                        @endforeach
                        <a id="btnDeleteAllCart" href="{{ route('delete.all.cart') }}" class="btn-delete-all-cart predominant-bg text-center">Excluir todos os itens</a>
                </ul>
            </div>
            <div class="col-12 col-lg-4">
                @include('pages.layouts.partials._sidebar_cart')
            </div>
            @else
                <div class="list-cart-empty">
                    <img src="{{ asset('images/cart-empty.png') }}" alt="" class="list-cart-empty-image">
                    <h3 class="list-cart-empty-text">Seu carrinho se encontra vazio</h3>
                </div>
            @endif
		</div>
	</div>
</section>
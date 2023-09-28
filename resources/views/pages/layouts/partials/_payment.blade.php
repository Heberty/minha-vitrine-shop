<ul class="menu-footer">
	<li class="menu-footer-item">
		<strong class="menu-footer-item-title predominant-color">Pagamento</strong>
	</li>
	<li class="menu-footer-item">
		<span class="menu-footer-item-subtitle">Pagamento à prazo</span>
		<ul class="list-cards">
			@if($card->hipercard)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/hipercard.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->american)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/american.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->aura)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/aura.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->hiper)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/hiper.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->visa)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/visa.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->diners)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/diners.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->elo)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/elo.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->aura)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/aura.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->master)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/master.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
		</ul>
	</li>
	<li class="menu-footer-item">
		<span class="menu-footer-item-subtitle">Pagamento à vista</span>
		<ul class="list-cards">
			@if($card->boleto)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/boleto.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->itau)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/itau.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->caixa)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/caixa.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->bradesco)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/bradesco.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->brasil)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/brasil.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->santander)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/santander.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->nubank)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/nubank.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->inter)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/inter.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
			@if($card->next)
				<li class="list-cards-item">
					<img src="{{ asset('images/cards/next.png') }}" alt="" class="list-cards-item-image">
				</li>
			@endif
		</ul>
	</li>
</ul>
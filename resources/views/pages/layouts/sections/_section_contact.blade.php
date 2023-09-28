<section class="section-contact {{ !Route::is('index') ? 'mt80' : '' }}" id="fale-conosco">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-9">
				<div class="title-section-box">
					<h1 class="title-section">
						Fale <span class="predominant-color">Conosco</span>
					</h1>
					<p class="title-section-description">Não encontrou o que queria ou está com alguma dúvida? Nos mande uma mensagem.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<form action="{{ route('send') }}" class="form-site" method="post">
					@if ($message = Session::get('success'))
						<div class="box-success-message alert alert-success alert-block" id="message">
							<button type="button" class="close" data-dismiss="alert">×</button>	
								<strong class="success-message">{{ $message }}</strong>
						</div>
					@endif
					<div class="row">
						@csrf
						<div class="form-group col-12 col-lg-7">
							<label for="name" class="form-label" style="color: {{ $setting->predominant_color }}!important;">Nome</label>
							<input id="name" name="name" type="text" class="form-control">
						</div>
						<div class="form-group col-12 col-lg-5">
							<label for="email" class="form-label" style="color: {{ $setting->predominant_color }}!important;">E-mail</label>
							<input id="email" name="email" type="text" class="form-control">
						</div>
						<div class="form-group col-12 col-lg-5">
							<label for="phone" class="form-label" style="color: {{ $setting->predominant_color }}!important;">Telefone/Whatsapp</label>
							<input id="phone" name="phone" type="text" class="form-control sp_celphones">
						</div>
						<div class="form-group col-12 col-lg-5">
							<label for="subject" class="form-label" style="color: {{ $setting->predominant_color }}!important;">Assunto</label>
							<div class="input-group">
								<select class="custom-select" id="subject" name="subject">
									<option selected>Selecione o assunto</option>
									<option value="Dúvidas">Dúvidas</option>
									<option value="Sugestões">Sugestões</option>
									<option value="Reclamações">Reclamações</option>
								</select>
							</div>
						</div>
						<div class="form-group col-12">
							<label for="message" class="form-label predominant-color">Mensagem</label>
							<textarea name="message" id="message" class="form-control"></textarea>
						</div>
						<div class="form-group col-12 text-center">
							<button class="btn-site predominant-bg">Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
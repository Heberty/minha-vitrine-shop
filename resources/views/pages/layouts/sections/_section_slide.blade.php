<section class="section-slide d-block" id="slide">
	<div class="owl-carousel" id="slide-carousel">
		@foreach($slides as $slide)
			@if($slide->active)
				<a href="https://api.whatsapp.com/send?phone=550{{ preg_replace('/\D/', '' ,$setting->whatsapp) }}&text={{ $setting->whatsapp_message . '%20' . $slide->title }}" class="slide-link" target="_blank">
					<img src="{{ $slide->image() }}" alt="" class="slide-image">
				</a>
			@endif
		@endforeach
	</div>
</section>
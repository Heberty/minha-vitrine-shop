<div class="sidebar-cart">
    <h2 class="sidebar-cart-title">Carrinho</h2>
    <div class="sidebar-cart-body">
        <strong class="sidebar-cart-body-total">{{ $sum }}</strong>
        @include('pages.layouts.partials._security_sales')
        <form action="{{ route('sendCart') }}" class="sidebar-cart-body-form" method="post" id="formCart">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome completo" name="name" id="name" value="{{ old('name') }}">
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Instagram" name="instagram" id="instagram" value="{{ old('instagram') }}">
                <span class="text-danger">@error('instagram') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Endereço completo" name="address" id="address" value="{{ old('address') }}">
                <span class="text-danger">@error('address') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input type="radio" id="entrega" name="entrega" class="custom-control-input" value="Entrega" {{ old('entrega') == 'Entrega' ? 'checked' : '' }} checked>
                    <label class="custom-control-label" for="entrega">Entrega</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="retirada" name="entrega" class="custom-control-input" value="Retirada" {{ old('entrega') == 'Retirada' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="retirada">Retirada</label>
                    <span class="text-danger">@error('entrega') {{ $message}} @enderror</span>
                </div>
            </div>
            <div class="form-group">
                @include('pages.layouts.partials._payment')
            </div>
            <div class="form-group">
                <small class="idebar-cart-body-small-text">Você será direcionado para o Whatsapp para finalizarmos a compra.</small>
            </div>
            <div class="text-center">
                <button id="sendCart" href="" class="btn-site btn-sale predominant_bg" target="_blank">Compra <img src="{{ asset('/images/icon-whatsapp.svg')}}" alt=""></button>
            </div>
        </form>
    </div>
</div>
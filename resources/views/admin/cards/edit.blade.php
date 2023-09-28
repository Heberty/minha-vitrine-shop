@extends('adminlte::page')

@section('title', 'Configurações de Cartões')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Configurações de Cartões</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.cards.update', $card) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <h5>Pagamento à prazo</h5>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="hipercard" name="hipercard" {{ $card->hipercard == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="hipercard">Hipercard</label>
                                    <img src="{{ asset('images/cards/hipercard.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="american" name="american" {{ $card->american == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="american">american</label>
                                    <img src="{{ asset('images/cards/american.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="aura" name="aura" {{ $card->aura == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="aura">aura</label>
                                    <img src="{{ asset('images/cards/aura.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="hiper" name="hiper" {{ $card->hiper == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="hiper">hiper</label>
                                    <img src="{{ asset('images/cards/hiper.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="visa" name="visa" {{ $card->visa == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="visa">visa</label>
                                    <img src="{{ asset('images/cards/visa.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="diners" name="diners" {{ $card->diners == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="diners">diners</label>
                                    <img src="{{ asset('images/cards/diners.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="elo" name="elo" {{ $card->elo == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="elo">elo</label>
                                    <img src="{{ asset('images/cards/elo.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="master" name="master" {{ $card->master == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="master">master</label>
                                    <img src="{{ asset('images/cards/master.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5>Pagamento à vista</h5>
                                <hr>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="boleto" name="boleto" {{ $card->boleto == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="boleto">boleto</label>
                                    <img src="{{ asset('images/cards/boleto.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="itau" name="itau" {{ $card->itau == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="itau">itau</label>
                                    <img src="{{ asset('images/cards/itau.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="caixa" name="caixa" {{ $card->caixa == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="caixa">caixa</label>
                                    <img src="{{ asset('images/cards/caixa.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="bradesco" name="bradesco" {{ $card->bradesco == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="bradesco">bradesco</label>
                                    <img src="{{ asset('images/cards/bradesco.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="brasil" name="brasil" {{ $card->brasil == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="brasil">brasil</label>
                                    <img src="{{ asset('images/cards/brasil.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="santander" name="santander" {{ $card->santander == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="santander">santander</label>
                                    <img src="{{ asset('images/cards/santander.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="nubank" name="nubank" {{ $card->nubank == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="nubank">nubank</label>
                                    <img src="{{ asset('images/cards/nubank.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="inter" name="inter" {{ $card->inter == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="inter">inter</label>
                                    <img src="{{ asset('images/cards/inter.png')}}" alt="">
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="next" name="next" {{ $card->next == 1 ? 'checked' : '' }}> 
                                    <label class="custom-control-label" for="next">next</label>
                                    <img src="{{ asset('images/cards/next.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop
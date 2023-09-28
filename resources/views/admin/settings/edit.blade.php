@extends('adminlte::page')

@section('title', 'Configurações da Vitrine')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Configurações da Vitrine</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.settings.update', $setting) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <div class="row align-items-center">
                    @if($user->type == 'admin')
                        <div class="form-grup col-12 text-center">
                            <p class="alert-info">Estes campos só aparecem para você Admin</p>
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active_linkme" name="active_linkme" {{ $setting->active_linkme == 1 ? 'checked' : '' }}> 
                                <label class="custom-control-label" for="active_linkme">Linkme</label>
                            </div>
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active_vitrine" name="active_vitrine" {{ $setting->active_vitrine == 1 ? 'checked' : '' }}> 
                                <label class="custom-control-label" for="active_vitrine">Vitrine</label>
                            </div>
                        </div>
                        <div class="form-group col-12 col-lg-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active_trial" name="active_trial" {{ $setting->active_trial == 1 ? 'checked' : '' }}> 
                                <label class="custom-control-label" for="active_trial">Trial</label>
                            </div>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="date_end">Fim do período de teste</label>
                            <input type="date" class="form-control" id="date_end" name="date_end" aria-describedby="emailHelp" value="{{ $setting->date_end }}">
                            <small id="emailHelp" class="form-text text-muted">Inseri aqui o data término do peíodo de teste</small>
                        </div>
                    @endif
                    <div class="col-12">
                        <hr>
                    </div>
                    @if($user->type == 'user')
                        <input type="hidden" name="active_linkme" value="{{ $setting->active_linkme == 1 ? '1' : '' }}">
                        <input type="hidden" name="active_vitrine" value="{{ $setting->active_vitrine == 1 ? '1' : '' }}">
                    @endif
                    <div class="form-group col-12">
                        <label for="title_site">Título da Vitrine*</label>
                        <input type="text" class="form-control" id="title_site" name="title_site" aria-describedby="emailHelp" value="{{ $setting->title_site }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui um título para sua vitrine.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="description_site">Descrição da Vitrine*</label>
                        <input type="text" class="form-control" id="description_site" name="description_site" aria-describedby="emailHelp" value="{{ $setting->description_site }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui uma descrição para sua vitrine.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="keywords_site">Keywords da Vitrine*</label>
                        <input type="text" class="form-control" id="keywords_site" name="keywords_site" aria-describedby="emailHelp" value="{{ $setting->keywords_site }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui alguns keywords separadas por vírgula para sua vitrine.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="favicon">Envie o favicon*</label>
                        <input type="file" class="form-control-file" id="favicon" name="favicon">
                        <small id="emailHelp" class="form-text text-muted">Insira aqui o favicon do site</small>
                        <div class="d-flex align-items-center justify-content-center" style="border-radius: 50%; width: 50px; height: 50px; padding: 10px; background-color: {{ $setting->predominant_color }}">
                            <img src="{{ storageImage('settings', $setting->favicon) }}" alt="" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="image">Envie a logo da sua Vitrine*</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <small id="emailHelp" class="form-text text-muted">Insira aqui a logo da vitrine em branco</small>
                        <div class="d-flex align-items-center justify-content-center" style="border-radius: 50%; width: 150px; height: 150px; padding: 30px; background-color: {{ $setting->predominant_color }}">
                            <img src="{{ storageImage('settings', $setting->image) }}" alt="" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="email">Email da Vitrine*</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $setting->email }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui o email que será usado na sua vitrine.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="analytics">Google Analytics</label>
                        <input type="text" class="form-control" id="analytics" name="analytics" aria-describedby="emailHelp" value="{{ !empty($setting->analytics) ? $setting->analytics : ' ' }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="tagmanager">Google Tagmanager</label>
                        <input type="text" class="form-control" id="tagmanager" name="tagmanager" aria-describedby="emailHelp" value="{{ $setting->tagmanager }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="whatsapp">Whatsapp*</label>
                        <input type="text" class="form-control sp_celphones" id="whatsapp" name="whatsapp" aria-describedby="emailHelp" value="{{ $setting->whatsapp }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="title_whatsapp">Título Whatsapp*</label>
                        <input type="text" class="form-control" id="title_whatsapp" name="title_whatsapp" aria-describedby="emailHelp" value="{{ $setting->title_whatsapp }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="whatsapp_message">Mensagem do Whatsapp*</label>
                        <input type="text" class="form-control" id="whatsapp_message" name="whatsapp_message" aria-describedby="emailHelp" value="{{ $setting->whatsapp_message }}">
                        <small id="emailHelp" class="form-text text-muted">Aqui você insere a mensagem padrão para quem clica no whatsapp</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control sp_celphones" id="phone" name="phone" aria-describedby="emailHelp" value="{{ $setting->phone }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="adress">Endereço</label>
                        <input type="text" class="form-control" id="adress" name="adress" aria-describedby="emailHelp" value="{{ $setting->adress }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="emailHelp" value="{{ $setting->facebook }}">
                        <small id="emailHelp" class="form-text text-muted">Ex.: /minhavitrine</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="instagram">Instagram*</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="emailHelp" value="{{ $setting->instagram }}">
                        <small id="emailHelp" class="form-text text-muted">Ex.: /minhavitrine</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="predominant_color">Cor predominante da vitrine*</label>
                        <input type="text" class="form-control color-picker" id="predominant_color" name="predominant_color" aria-describedby="emailHelp" value="{{ $setting->predominant_color }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="secondary_color">Cor secundária da vitrine*</label>
                        <input type="text" class="form-control color-picker" id="secondary_color" name="secondary_color" aria-describedby="emailHelp" value="{{ $setting->secondary_color }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="button_color">Cor dos botões da vitrine*</label>
                        <input type="text" class="form-control color-picker" id="button_color" name="button_color" aria-describedby="emailHelp" value="{{ $setting->button_color }}">
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="button_color">QR Code*</label>
                        <div class="visible-print text-center">
                             {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(Request::url())) !!} "> --}}
                            <p>Me escaneie para retornar à página principal</p>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="text_legal">Texto legal da vitrine*</label>
                        <textarea name="text_legal" id="text_legal" cols="30" rows="10" class="form-control dkeditor-text-area">{{ $setting->text_legal }}</textarea>
                        <small id="emailHelp" class="form-text text-muted">Esse texto aparecerá no rodapé da vitrine.</small>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    @if($setting->active_linkme)
                        <div class="form-grup col-12 text-center">
                            <p class="alert-info">Estes campos só aparecem se o Linkme estiver ativo</p>
                        </div>
                        <div class="col-12">
                            <h3>Whatsapp adicionais</h3>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="whatsapp_02">Whatsapp 02</label>
                            <input type="text" class="form-control sp_celphones" id="whatsapp_02" name="whatsapp_02" aria-describedby="emailHelp" value="{{ $setting->whatsapp_02 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_whatsapp_02">Título Whatsapp 02</label>
                            <input type="text" class="form-control" id="title_whatsapp_02" name="title_whatsapp_02" aria-describedby="emailHelp" value="{{ $setting->title_whatsapp_02 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="whatsapp_03">Whatsapp 03</label>
                            <input type="text" class="form-control sp_celphones" id="whatsapp_03" name="whatsapp_03" aria-describedby="emailHelp" value="{{ $setting->whatsapp_03 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_whatsapp_03">Título Whatsapp 03</label>
                            <input type="text" class="form-control" id="title_whatsapp_03" name="title_whatsapp_03" aria-describedby="emailHelp" value="{{ $setting->title_whatsapp_03 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="whatsapp_04">Whatsapp 04</label>
                            <input type="text" class="form-control sp_celphones" id="whatsapp_04" name="whatsapp_04" aria-describedby="emailHelp" value="{{ $setting->whatsapp_04 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_whatsapp_04">Título Whatsapp 04</label>
                            <input type="text" class="form-control" id="title_whatsapp_04" name="title_whatsapp_04" aria-describedby="emailHelp" value="{{ $setting->title_whatsapp_04 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="whatsapp_05">Whatsapp 05</label>
                            <input type="text" class="form-control sp_celphones" id="whatsapp_05" name="whatsapp_05" aria-describedby="emailHelp" value="{{ $setting->whatsapp_05 }}">
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_whatsapp_05">Título Whatsapp 05</label>
                            <input type="text" class="form-control" id="title_whatsapp_05" name="title_whatsapp_05" aria-describedby="emailHelp" value="{{ $setting->title_whatsapp_05 }}">
                        </div>
                        <div class="col-12">
                            <h3>Links adicionais</h3>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="link_01">Link 01</label>
                            <input type="text" class="form-control" id="link_01" name="link_01" aria-describedby="emailHelp" value="{{ $setting->link_01 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: http://meusite.com.br</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_link_01">Título Link 01</label>
                            <input type="text" class="form-control" id="title_link_01" name="title_link_01" aria-describedby="emailHelp" value="{{ $setting->title_link_01 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: Blog, Site, Loja Vitrual, etc.</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="link_02">Link 02</label>
                            <input type="text" class="form-control" id="link_02" name="link_02" aria-describedby="emailHelp" value="{{ $setting->link_02 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: http://meusite.com.br</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_link_02">Título Link 02</label>
                            <input type="text" class="form-control" id="title_link_02" name="title_link_02" aria-describedby="emailHelp" value="{{ $setting->title_link_02 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: Blog, Site, Loja Vitrual, etc.</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="link_03">Link 03</label>
                            <input type="text" class="form-control" id="link_03" name="link_03" aria-describedby="emailHelp" value="{{ $setting->link_03 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: http://meusite.com.br</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_link_03">Título Link 03</label>
                            <input type="text" class="form-control" id="title_link_03" name="title_link_03" aria-describedby="emailHelp" value="{{ $setting->title_link_03 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: Blog, Site, Loja Vitrual, etc.</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="link_04">Link 04</label>
                            <input type="text" class="form-control" id="link_04" name="link_04" aria-describedby="emailHelp" value="{{ $setting->link_04 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: http://meusite.com.br</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_link_04">Título Link 04</label>
                            <input type="text" class="form-control" id="title_link_04" name="title_link_04" aria-describedby="emailHelp" value="{{ $setting->title_link_04 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: Blog, Site, Loja Vitrual, etc.</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="link_05">Link 05</label>
                            <input type="text" class="form-control" id="link_05" name="link_05" aria-describedby="emailHelp" value="{{ $setting->link_05 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: http://meusite.com.br</small>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="title_link_05">Título Link 05</label>
                            <input type="text" class="form-control" id="title_link_05" name="title_link_05" aria-describedby="emailHelp" value="{{ $setting->title_link_05 }}">
                            <small id="emailHelp" class="form-text text-muted">Ex.: Blog, Site, Loja Vitrual, etc.</small>
                        </div>
                    @endif
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
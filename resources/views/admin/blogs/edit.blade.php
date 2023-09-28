@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')

    <div class="row">
        <div class="col-12">
            <h1>Editar Produto - {{ $product->title }}</h1>
        </div>
    </div>

@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <input type="hidden" value="{{ $product->active }}" name="active">
                <input type="hidden" value="{{ $product->availability }}" name="availability">
                <input type="hidden" value="{{ $product->condition }}" name="condition">
                <input type="hidden" value="{{ route('offer', $product->slug) }}" name="link">
                <input type="hidden" value="{{ $product->product() }}" name="image_link">
                <div class="row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ $product->title }}">
                        <small id="emailHelp" class="form-text text-muted">Este é o nome de seu produto.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="brand">Marca</label>
                        <input type="text" class="form-control" id="brand" name="brand" aria-describedby="emailHelp" value="{{ $product->brand }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui a marca ou referência do produto.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="price">Valor</label>
                        <div class="d-flex align-items-center">
                            <h5 style="margin-bottom: 0; margin-right: 10px;">R$</h5>
                            <input type="text" class="form-control money" id="price" name="price" aria-describedby="emailHelp" value="{{ formatPrice($product->price) }}">
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Insira o valor do produto sem o R$(Sifrão).</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="text_legal">Texto legal</label>
                        <input type="text" class="form-control" id="text_legal" name="text_legal" aria-describedby="emailHelp" value="{{ $product->text_legal }}">
                        <small id="emailHelp" class="form-text text-muted">Ex. Em até 3x Sem Juros(Sem o asterisco).</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="amount">Quantidade em estoque</label>
                        <input type="text" class="form-control" id="amount" name="amount" aria-describedby="emailHelp" value="{{ $product->amount }}">
                        <small id="emailHelp" class="form-text text-muted">Insira a quantidade em estoque, de 03 abaixo exibe o selo de "Restam apenas 3"</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label>Selos</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="delivery_free" name="delivery_free" {{ $product->delivery_free == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="delivery_free">Entrega Grátis</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="super_offer" name="super_offer" {{ $product->super_offer == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label" for="super_offer">Super Oferta</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="promotion" name="promotion" {{ $product->promotion == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="promotion">Promoção</label>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Escolha estes selos para dar mais destaque ao produto.</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="type_id">Categorias: </label>
                        <select class="form-control" name="type_id" id="type_id">
                            <option disabled selected>Selecione</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $product->type_id == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-1">
                        <label for="position">Ordem</label>
                        <input type="number" class="form-control" id="position" name="position" value="{{ $product->position }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="description">Descrição</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control dkeditor-text-area">{{ $product->description }}</textarea>
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui uma descrição para seu produto.</small>
                    </div>
                    <div class="col-12"></div>
                    <div class="form-group col-12 col-md-6 col-lg-6 col-xl-4">
                        <label for="video">Vídeo do Youtube</label>
                        <div class="d-flex align-items-center">
                            <span style="white-space: nowrap; margin-right: 10px; font-size:12px;">https://www.youtube.com/watch?v=</span>
                            <input type="text" class="form-control" id="video" name="video" aria-describedby="emailHelp" value="{{ $product->video }}" placeholder="_Cf-wZhdHSE">
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Vídeo atual:</label>
                        <div>
                            <a href="https://www.youtube.com/watch?v={{ $product->video }}" data-fancybox="youtube"><img src="https://img.youtube.com/vi/<{{ $product->video }}/hqdefault.jpg" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="image">Escolha o arquivo para substituir a imagem principal do produto</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <label for="current">Imagem atual:</label>
                        <img src="{{ $product->product() }}" alt="" style="width: 300px;">
                    </div>
                    <div class="form-group col-12">
                        <label for="gallery">Acrescente mais fotos a galeria</label>
                        <input type="file" class="form-control-file" id="gallery" name="gallery[]" multiple>
                        <small id="emailHelp" class="form-text text-muted">Segure a tecla ctrl para selecionar mais de uma foto</small>
                    </div>
                    <div class="form-group col-12">
                        <label>Fotos atuais</label>
                        <ul class="list-unstyled d-flex flex-wrap">
                            @forelse($product->gallery as $image)
                                <li style="width: 22.222%; margin: 0 5;">
                                    <div style="background-image: url('{{ storageImage('galleries', $image->name) }}'); width: 100%; height: 200px; background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                                    <a class="btn btn-danger" onclick="return confirm('Deseja realmente excluir a imagem?')" href="{{ route('admin.products.destroyImage', $image) }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            @empty
                        </ul>
                            Não há imagens na galeria
                        @endforelse
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
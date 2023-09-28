@extends('adminlte::page')

@section('title', 'Adicionar Produto')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Adicionar Produto</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" value="1" name="active">
                <div class="row">
                    <div class="form-group col-12 col-lg-6">
                        <label for="title">Título*</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ old('title') }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui um título para a postagem.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="subtitle">Subtitulo</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" aria-describedby="emailHelp" value="{{ old('subtitle') }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri aqui o subtítulo da postagem.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="author">Autor*</label>
                        <input type="text" class="form-control" id="author" name="author" aria-describedby="emailHelp" value="{{ old('author') }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri autor da postagem.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="fonte">Fonte*</label>
                        <input type="text" class="form-control" id="fonte" name="fonte" aria-describedby="emailHelp" value="{{ old('fonte') }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri a fonte da postagem.</small>
                    </div>
                    <div class="form-group col-12 col-lg-6">
                        <label for="fonte_link">Link da fonte*</label>
                        <input type="text" class="form-control" id="fonte_link" name="fonte_link" aria-describedby="emailHelp" value="{{ old('fonte_link') }}">
                        <small id="emailHelp" class="form-text text-muted">Inseri o link da fonte da postagem.</small>
                    </div>
                    <div class="form-group col-6">
                        <label for="blog_id">Categorias*: </label>
                        <select class="form-control" name="blog_id" id="blog_id">
                            <option disabled selected>Selecione</option>
                            @foreach($blog_types as $type)
                                <option value="{{ $type->id }}" {{ old('blog_types') == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="order">Ordem</label>
                        <input type="number" class="form-control" id="order" name="order" value="{{ old('order') ?? '1' }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="text">Texto da postagem*</label>
                        <textarea name="text" id="text" cols="30" rows="10" class="form-control dkeditor-text-area">{{ old('text') }}</textarea>
                        <small id="emailHelp" class="form-text text-muted">Inseri o texto da postagem.</small>
                    </div>
                    <div class="form-group col-12">
                        <label for="image_full">Escolha a imagem principal da postagem*</label>
                        <input type="file" class="form-control-file" id="image_full" name="image_full">
                    </div>
                    <div class="form-group col-12">
                        <label for="thumbnail">Escolha a thumbnail da postagem</label>
                        <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                    </div>
                    <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Editar Slide')

@section('content_header')

    <div class="row">
        <div class="col-12">
            <h1>Editar Slide - {{ $slide->title }}</h1>
        </div>
    </div>

@stop

@section('content')

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-4">
            <form method="POST" action="{{ route('admin.slides.update', $slide) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ $slide->title }}">
                    <small id="emailHelp" class="form-text text-muted">Este é o nome de seu slide.</small>
                </div>
                <div class="form-group">
                    <label for="image">Escolha o arquivo para substituir o slide</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="current">Imagem atual:</label>
                    <img src="{{ $slide->image() }}" alt="" style="width: 300px;">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" {{ $slide->active == 1 ? 'checked' : '' }}> 
                        <label class="custom-control-label" for="active">Ativo?</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

@stop
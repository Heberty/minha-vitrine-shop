@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')

    <div class="row">
        <div class="col-12">
            <h1>Editar Categoria - {{ $type->title }}</h1>
        </div>
    </div>

@stop

@section('content')

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-4">
            <form method="POST" action="{{ route('admin.types.update', $type) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}
                <input type="hidden" value="{{ $type->active }}" name="active">
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ $type->title }}">
                    <small id="emailHelp" class="form-text text-muted">Este é o nome da sua Categoria.</small>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

@stop
@extends('adminlte::page')

@section('title', 'Adicionar Categoria')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1>Adicionar Categoria</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12 col-lg-6 col-xl-4">
            <form method="POST" action="{{ route('admin.types.store') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" value="1" name="active">
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Inseri aqui um nome para sua categoria.</small>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@stop
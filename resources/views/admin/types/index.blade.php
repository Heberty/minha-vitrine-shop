@extends('adminlte::page')

@section('title', 'Lista de Categorias')

@section('content_header')
    <div class="col-12 d-flex justify-content-between">
        <h1>Lista de Categorias</h1>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Adicionar</a>
    </div>
@stop

@section('content')
    <div class="col-12">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Ativo?</th>
                    <th scope="col">Título</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->active ? 'Sim' : 'Não' }}</td>
                    <td>{{ $type->title }}</td>
                    <td class="d-inline-flex">
                        <a href="{{ route('admin.types.edit', $type)}}" class="btn btn-warning text-light mr-2"><i class="far fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.types.destroy', $type) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="delete">
                            <button onclick="return confirm('Deseja realmente excluir o slide {{ $type->title }}?')" class="btn btn-danger text-light"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $types->links() !!}
    </div>
@stop
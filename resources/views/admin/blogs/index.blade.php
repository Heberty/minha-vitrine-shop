@extends('adminlte::page')

@section('title', 'Lista de Postagens')

@section('content_header')
    <div class="col-12 d-flex justify-content-between">
        <h1>Lista de Postagens</h1>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Adicionar</a>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Ativo?</th>
                        <th scope="col">Título</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Ordem</th>
                        <th scope="col">Data de Criação</th>
                        <th scope="col">Data de Atualização</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td>{{ $blog->active ? 'Sim' : 'Não' }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>
                            <a href="{{ $blog->image('image_full') }}"  style="display:block; width: 40px; height: 40px; border-radius: 50%; overflow: hidden;" data-fancybox="image-slide">
                                <img src="{{ $blog->image('image_full') }}" alt="" class="img-fluid">
                            </a>
                        </td>
                        <td>{{ $blog->order }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>{{ $blog->updated_at }}</td>
                        <td class="d-inline-flex">
                            <a href="{{ route('admin.blogs.edit', $blog)}}" class="btn btn-warning text-light mr-2"><i class="far fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="delete">
                                <button onclick="return confirm('Deseja realmente excluir o produto {{ $blog->title }}?')" class="btn btn-danger text-light"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $blogs->links() !!}
    </div>
@stop
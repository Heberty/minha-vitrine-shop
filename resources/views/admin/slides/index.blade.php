@extends('adminlte::page')

@section('title', 'Lista de Slides')

@section('content_header')
    <div class="col-12 d-flex justify-content-between">
        <h1>Lista de Slides</h1>
        <a href="{{ route('admin.slides.create') }}" class="btn btn-primary">Adicionar</a>
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
                    <th scope="col">Imagem</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slides as $slide)
                <tr>
                    <th scope="row">{{ $slide->id }}</th>
                    <td>{{ $slide->active ? 'Sim' : 'Não' }}</td>
                    <td>{{ $slide->title }}</td>
                    <td>
                        <a href="{{ $slide->image() }}"  style="display:block; width: 40px; height: 40px; border-radius: 50%; overflow: hidder;" data-fancybox="image-slide">
                            <img src="{{ $slide->image() }}" alt="" class="img-fluid">
                        </a>
                    </td>
                    <td class="d-inline-flex">
                        <a href="{{ route('admin.slides.edit', $slide)}}" class="btn btn-warning text-light mr-2"><i class="far fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.slides.destroy', $slide) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="delete">
                            <button onclick="return confirm('Deseja realmente excluir o slide {{ $slide->title }}?')" class="btn btn-danger text-light"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $slides->links() !!}
    </div>
@stop
@extends('adminlte::page')

@section('title', 'Lista de Produtos')

@section('content_header')
    <div class="col-12 d-flex justify-content-between">
        <h1>Lista de Produtos</h1>
        <a href="/produtoscsv" class="btn btn-warning ml-auto mr-1" target="_blank">Gerar CSV</a>
        <a href="/xml" class="btn btn-success mr-1" target="_blank">Gerar XML</a>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Adicionar</a>
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
                    <th scope="col">Ordem</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->active ? 'Sim' : 'Não' }}</td>
                    <td>{{ $product->title }}</td>
                    <td>
                        <a href="{{ $product->product() }}"  style="display:block; width: 40px; height: 40px; border-radius: 50%; overflow: hidden;" data-fancybox="image-slide">
                            <img src="{{ $product->product() }}" alt="" class="img-fluid">
                        </a>
                    </td>
                    <td>{{ $product->position }}</td>
                    <td style="{{ $product->amount <= 3 ? 'color: red; font-weight: bold;' : '' }}">{{ $product->amount }}</td>
                    <td class="d-inline-flex">
                        <a href="{{ route('admin.products.edit', $product)}}" class="btn btn-warning text-light mr-2"><i class="far fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="delete">
                            <button onclick="return confirm('Deseja realmente excluir o produto {{ $product->title }}?')" class="btn btn-danger text-light"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $products->links() !!}
    </div>
@stop
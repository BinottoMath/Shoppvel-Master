@extends('layouts.admin')
@section('conteudo')

<h2>Produtos</h2>

<p>
    <a class="btn btn-primary" role="button" href="{{route('produto.novo')}}">Novo Produto</a>
</p>


<table class="col-lg-9 table table-bordered">
    <thead>
        <th>ID</th>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Marca</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th class="col-sm-3">Gerenciar</th>
    </thead>
@foreach ($produtos as $prod)
    <tr>
        <td>{{ $prod->id }}</td>
        
        <td>
            <img src="{{route('imagem.file',$prod->imagem_nome)}}" alt="{{$prod->imagem_nome}}" style="width:150px;" >
        </td>
        <td>{{ $prod->nome }}</td>
        <td>{{ $prod->categoria['nome'] }}</td>
        <td>{{ $prod->marca['nome']}}</td>
        <td>{{ $prod->qtde_estoque}}</td>
        <td>{{ $prod->preco_venda }}</td>
        <td>
            <a class="btn btn-warning" href="{{route('produto.alterar',$prod->id)}}">
                Alterar
            </a>
            <a class="btn btn-danger" href="{{route('produto.confirmar_exclusao',$prod->id)}}">
                Excluir
            </a>
        </td>
    </tr>
@endforeach
</table>
@stop
@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <div class="page-header text-muted">
        {{$produtos->total()}} encontrado(s) com o termo de busca 
        <span class="label label-info">{{$termo}}</span>
    </div>
</div>

<div class="col-sm-12 text-center">
    {!! $produtos->appends(['termo-pesquisa' => $termo])->links() !!}
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Produto</th>
            <th>Rating</th>
            <th>Disponibilidade</th>
            <th class="text-right">Valor Unitário</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)

        <tr>
            <td>
                <img src="{{route('imagem.file',$produto->imagem_nome)}}" alt="{{$produto->imagem_nome}}" style="width:150px;" >
            </td>
            <td>
                <a href="{{route('produto.detalhes', $produto->id)}}">
                    {{$produto->nome}}
                </a>
            </td>
            <td>{{$produto->id}}</td>
            <td>{{$produto->qtde_estoque}}</td>
            <td class="text-right">
        
                {{number_format($produto->preco_venda, 2, ',', '.')}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="col-sm-12 text-center">
    {!! $produtos->links() !!}
</div>
@stop
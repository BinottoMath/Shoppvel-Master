    @extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <h2 class="page-header text-info">
        {{$produto->nome}}
    </h2>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="thumbnail">
            <img src="{{route('imagem.file',$produto->imagem_nome)}}" alt="{{$produto->imagem_nome}}">
            <h4 class="text-muted">&copy; {{$produto->marca->nome}}</h4>
            <h5 class="text-muted">categoria >> {{$produto->categoria->nome}}</h5>
        </div>
    </div>
    <div class="col-md-3 col-sm-">
        @if ($produto->qtde_estoque > 0) 
            <h2 class="text-center text-info"> R$ {{number_format($produto->preco_venda, 2, ',', '.')}}</h2>
            <div class="col-sm-12 text-center">
                {{ Form::open (['route' => ['carrinho.adicionar', $produto->id]]) }}
                    {{ Form::text('qtde', 1, ['class'=>'col-sm-1']) }}
                    {{ Form::submit('Adicionar ao carrinho', ['class'=>'btn btn-primary btn-sm col-sm-11    ']) }}
                {{ Form::close() }}
            </div>
        @else
            <h2 class="text-center text-warning"> Indisponível no momento</h2>
        @endif
        
        <hr/>
        <hr/>
        
        <div class="text-center">
        @if ($produto->avaliacao_qtde > 0) 
            Média de avaliações <br/>
            <h4 class="alert alert-success">
                {{round($produto->avaliacao_total / $produto->avaliacao_qtde)}}
            </h4>
        @else
            <span class="text-muted">Não avaliado</span>
        @endif
        {{ Form::open (['route' => ['produto.avaliar', $produto->id]])}}
                {!! Form::hidden('avaliacao_qtde') !!}<br/>                     
                {!! Form::select('avaliacao_total', array('1' => 0 ,'1' => 1, '2' => 2 ,'3' => 3 ,'4' => 4, '5' => 5 ,'6' => 6 ,'7' => 7 ,'8' => 8 ,'9' => 9 ,'10' => 10), null, ['placeholder' => 'Selecione...']) !!}<br/>
                {{ Form::submit('Avaliar', ['class'=>'btn btn-primary btn-sm col-sm-9']) }}<br/>
        {{ Form::close() }}
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div>
            @if($produto->destacado == 1)
                <p class="label label-warning">Produto em destaque!</p>
            @endif
        </div>

        <p>Formas de pagamento</p>
        PAGSEGURO AQUI
    </div>
    <div>
        Rating Aqui
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header">Descrição detalhada</h3>
        {{$produto->descricao}}
    </div>

</div>
@stop
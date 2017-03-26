@extends('layouts.frente-loja')
@section('conteudo')

<h2>Novo Produto</h2>

{!! Form::open(array('route' => 'produto.salvar', 'files'=>true)) !!} 
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    {!! Form::text('nome') !!}<br/>
    {!! Form::label('descricao', 'Descrição') !!}<br/>
    {!! Form::textarea('descricao', null, ['size' => '30x5']) !!}<br/>
    {!! Form::label('qtde_estoque', 'Quantidade') !!}<br/>
    {!! Form::text('qtde_estoque') !!}<br/>
    {!! Form::label('preco_venda', 'Preço Venda') !!}<br/>
    {!! Form::text('preco_venda') !!}<br/>
    {!! Form::label('imagem', 'Nome Imagem') !!}<br/>
    {!! Form::file('imagem') !!}<br/>

    {!! Form::label('categoria', 'Categoria') !!}<br/>
   	{!! Form::select('categoria_id',$categoria, null, ['placeholder' => 'Selecione:'])!!}<br/>
   	{!! Form::label('marca', 'Marca') !!}<br/>
   	{!! Form::select('marca_id',$marca, null, ['placeholder' => 'Selecione:'])!!}<br/>
    {!! Form::label('destacado', 'Destacado') !!}<br/>
    {!! Form::select('destacado', array('1' => 'Sim', '0' => 'Não'), null, ['placeholder' => 'Selecione...']) !!}<br/><br/>

    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}
@stop
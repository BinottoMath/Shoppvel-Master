@extends('layouts.admin')
@section('conteudo')
<h2>
Alterar Produto {{$produto->id}} - {{$produto->destacado}} 
</h2>

{!! Form::model ($produto, ['route' => ['produto.salvar', $produto->id]]) !!}
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    {!! Form::text('nome') !!}<br/>
    {!! Form::label('descricao', 'Descrição') !!}<br/>
    {!! Form::textarea('descricao') !!}<br/>
    {!! Form::hidden('id') !!}<br/>

    {!! Form::label('qtde_estoque', 'Quantidade') !!}<br/>
    {!! Form::text('qtde_estoque') !!}<br/>
    {!! Form::label('preco_venda', 'Preço Venda') !!}<br/>
    {!! Form::text('preco_venda') !!}<br/>

    {!! Form::label('categoria', 'Categoria') !!}<br/>
   	{!! Form::select('categoria_id',$categorias->lists('nome','id'))!!}<br/><br/>

   	{!! Form::label('marca', 'Marca') !!}<br/>
   	{!! Form::select('marca_id',$marcas->lists('nome','id'))!!}<br/><br/>
   	
    {!! Form::label('destacado', 'Destacado') !!}<br/>
    {!! Form::select('destacado', array('1' => 'Sim', '0' => 'Não'),'{{$produto->destacado}}') !!}<br/><br/>

    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}
@stop
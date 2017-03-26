@extends('layouts.admin')
@section('conteudo')

<h2>Excluir Produto</h2>

<p>Tem certeza que deseja excluir este Produto?</p>

{!! Form::model ($produto, ['route' => ['produto.excluir', $produto->id]]) !!}
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    <p>{{$produto->nome}}</p><br/>
    {!! Form::submit('Sim') !!}
    {!! Form::button('Não') !!}
</p>
{!! Form::close() !!}
@stop
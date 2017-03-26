@extends('layouts.admin')
@section('conteudo')

<h2>Excluir Categoria</h2>

<p>Tem certeza que deseja excluir esta categoria?</p>

{!! Form::model ($categoria, ['route' => ['categoria.excluir', $categoria->id]]) !!}
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    <p>{{$categoria->nome}}</p><br/>
    {!! Form::submit('Sim') !!}
    {!! Form::button('Não') !!}
</p>
{!! Form::close() !!}
@stop
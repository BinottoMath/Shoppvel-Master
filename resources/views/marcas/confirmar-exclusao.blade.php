@extends('layouts.admin')
@section('conteudo')

<h2>Excluir Marca</h2>

<p>Tem certeza que deseja excluir esta marca?</p>

{!! Form::model ($marca, ['route' => ['marca.excluir', $marca->id]]) !!}
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    <p>{{$marca->nome}}</p><br/>
    {!! Form::submit('Sim') !!}
    {!! Form::button('Não') !!}
</p>
{!! Form::close() !!}
@stop
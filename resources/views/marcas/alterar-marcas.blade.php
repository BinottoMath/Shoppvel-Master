@extends('layouts.admin')
@section('conteudo')
<h2>
Alterar Marca {{$marca->id}}
</h2>

{!! Form::model ($marca, ['route' => ['marca.salvar', $marca->id]]) !!}
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    {!! Form::text('nome') !!}<br/>
    {!! Form::hidden('id') !!}<br/>
    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}
@stop
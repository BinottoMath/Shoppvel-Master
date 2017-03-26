@extends('layouts.admin')

@section('conteudo')

<h2>Nova Marca</h2>

{!! Form::open(array('route' => 'marca.salvar')) !!} 
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    {!! Form::text('nome') !!}<br/>
   


    {!! Form::submit('Salvar') !!}
</p>
{!! Form::close() !!}
@stop
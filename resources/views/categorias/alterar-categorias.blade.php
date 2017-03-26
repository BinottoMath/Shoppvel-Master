@extends('layouts.admin')
@section('conteudo')
<h2>
Alterar Categoria {{$categoria->id}}
</h2>

{!! Form::model ($categoria, ['route' => ['categoria.salvar', $categoria->id]]) !!}
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    {!! Form::text('nome') !!}<br/>
    {!! Form::label('categoria_id', 'Categoria Pai') !!}<br/>
   	{!! Form::select('categoria_id',$categoriasPai->lists('nome','id'))!!}
    {!! Form::hidden('id') !!}<br/>
    {!! Form::submit('Enviar') !!}
</p>
{!! Form::close() !!}
@stop
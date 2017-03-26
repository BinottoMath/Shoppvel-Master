@extends('layouts.admin')

@section('conteudo')

<h2>Nova Categoria</h2>

{!! Form::open(array('route' => 'categoria.salvar')) !!} 
<p>
    {!! Form::label('nome', 'Nome') !!}<br/>
    {!! Form::text('nome') !!}<br/>
    {!! Form::label('categoria_id', 'Categoria Pai') !!}<br/>

   	{!! Form::select('categoria_id',$categoriasPai, null, ['placeholder' => 'Selecione:'])!!}<br/><br/>

    {!! Form::submit('Salvar') !!}
</p>
{!! Form::close() !!}
@stop
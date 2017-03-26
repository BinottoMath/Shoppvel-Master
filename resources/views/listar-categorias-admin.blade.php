@extends('layouts.admin')
@section('conteudo')

<h2>Alterar Categoria</h2>
<table class="">
    <thead>
        <th>Nome</th>
        <th>Gerenciar</th>
    </thead>
@foreach ($categorias_listar as $categoria)
    <tr>
        <td>{{ $categoria->nome }}</td>
        <td>
            <a href="{{ url('categoria/alterar_categoria/'.$categoria->id) }}">
                Alterar
            </a>
            <a href="{{ url('categoria/excluir_categoria/'.$categoria->id) }}">
                Excluir
            </a>
        </td>
    </tr>
@endforeach
</table>
@stop
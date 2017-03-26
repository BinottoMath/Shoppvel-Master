@extends('layouts.admin')
@section('conteudo')

<h2>Categoria</h2>

<p>
    <a class="btn btn-primary" role="button" href="{{route('categoria.nova')}}">Nova Categoria</a>
</p>
<table class="table table-bordered">
    <thead>
        <th>Nome</th>
        <th class="col-md-4">Gerenciar</th>
        <th></th>
    </thead>
@foreach ($categorias as $cat)
    <tr>
        <td>{{ $cat->nome }}</td>
        <td>
            <a class="btn btn-warning" href="{{route('categoria.alterar',$cat->id)}}">
                Alterar
            </a>

            @if(count($cat->produtos) > 0)
                <a class="btn btn-danger" href="{{route('categoria.confirmar_exclusao',$cat->id = -1)}}">
                    Excluir
                </a>
            @else
                <a class="btn btn-danger" href="{{route('categoria.confirmar_exclusao',$cat->id)}}">
                    Excluir
                </a>
            @endif
        </td>
    </tr>
@endforeach
</table>
@stop
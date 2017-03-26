@extends('layouts.admin')
@section('conteudo')

<h2>Marcas</h2>

<p>
    <a class="btn btn-primary" role="button" href="{{route('marca.nova')}}">Nova Marca</a>
</p>
<table class="table table-bordered">
    <thead>
        <th>Nome</th>
        <th class="col-md-4">Gerenciar</th>
    </thead>
@foreach ($marcas as $marc)
    <tr>
        <td>{{ $marc->nome }}</td>
        <td>
            <a class="btn btn-warning" href="{{route('marca.alterar',$marc->id)}}">
                Alterar
            </a>
            @if(count($marc->produtos) > 0)
                <a class="btn btn-danger" href="{{route('marca.confirmar_exclusao',$marc->id = -1)}}">
                    Excluir
                </a>
            @else
                <a class="btn btn-danger" href="{{route('marca.confirmar_exclusao',$marc->id)}}">
                    Excluir
                </a>
            @endif
        </td>
    </tr>
@endforeach
</table>
@stop
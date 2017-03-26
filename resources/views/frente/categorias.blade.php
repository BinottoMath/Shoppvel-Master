@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <h2 class="page-header text-info">
        Categorias
    </h2>
</div>
<div class="col-sm-6 col-md-4">
    <ul class="tree-view">
    @foreach($categorias_pai as $categoria)
        <li>
            <i></i>
            <a href="{{route('categoria.listar', $categoria->id)}}">
                {{ $categoria->nome }}
            </a>
            @if(count($categoria->childs))
                @include('manageChild',['childs' => $categoria->childs])
            @endif
        </li>
    @endforeach
    </ul>
     
</div>
@stop


<ul>
@foreach($childs as $child)
	<li>
	    <a href="{{route('categoria.listar', $child->id)}}">
            {{ $child->nome }}
        </a>
	@if(count($child->childs))
            @include('manageChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>
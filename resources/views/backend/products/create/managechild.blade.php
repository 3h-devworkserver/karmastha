<ul>
@foreach($childs as $child)
	<li>
	    {{Form::checkbox('category[]', $child->id)}} {{ $child->title}}
	@if(count($child->childs))
            @include('backend.products.create.managechild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>
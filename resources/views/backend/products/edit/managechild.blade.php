<ul>
@foreach($childs as $child)
	<li>
		@if(in_array($child->id, $catSelected->toArray()))	
	    	{{Form::checkbox('category[]', $child->id, true, ['id'=>'checkbox'.$child->id])}}<label for="checkbox{{$child->id}}"><span></span></label> {{ $child->title}}
	    @else
	    	{{Form::checkbox('category[]', $child->id, null, ['id'=>'checkbox'.$child->id])}}<label for="checkbox{{$child->id}}"><span></span></label> {{ $child->title}}
	    @endif
		@if(count($child->childs))
            @include('backend.products.edit.managechild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>
<ul>
@foreach($childs as $child)
	<li>
	    {{Form::checkbox('category[]', $child->id, null, ['id'=>'checkbox'.$child->id])}}<label for="checkbox{{$child->id}}"><span></span></label> {{ $child->title}}
	@if(count($child->childs))
            @include('backend.products.create.managechild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>
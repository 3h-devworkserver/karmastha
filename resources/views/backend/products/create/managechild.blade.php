<ul>
@foreach($childs as $child)
	<li>
	    {{Form::checkbox('category[]', $child->id, null, ['id'=>'checkbox'.$child->id, 'data-parent-id'=>'checkbox'.$parentId])}}<label for="checkbox{{$child->id}}"><span></span></label> {{ $child->title}}
	@if(count($child->childs))
            @include('backend.products.create.managechild',['childs' => $child->childs, 'parentId'=>$child->id])
        @endif
	</li>
@endforeach
</ul>
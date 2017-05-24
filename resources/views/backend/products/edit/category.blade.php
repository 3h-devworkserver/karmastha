<div class="box box-orange">
	<div class="box-header with-border">
		<h3 class="box-title">Category Associations</h3>
		<div class="box-tools pull-right">
	        @include('backend.products.includes.expandcollapsebutton')
	    </div><!--box-tools pull-right-->
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<ul id="tree1">
		    @foreach($categorys as $category)
	            <li >
	            @if(in_array($category->id, $catSelected->toArray()))
	                {{Form::checkbox('category[]', $category->id, true, ['id'=>'checkbox'.$category->id])}}<label for="checkbox{{$category->id}}"><span></span></label> {{ $category->title }}
	            @else
	                {{Form::checkbox('category[]', $category->id, null, ['id'=>'checkbox'.$category->id])}}<label for="checkbox{{$category->id}}"><span></span></label> {{ $category->title }}
	            @endif

	                @if(count($category->childs))
	                    @include('backend.products.edit.managechild',['childs' => $category->childs])
	                @endif
	            </li>
	        @endforeach
		</ul>
	</div>
	<!-- /.box-body -->
</div>
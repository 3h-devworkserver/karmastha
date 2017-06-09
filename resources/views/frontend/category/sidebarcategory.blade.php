@foreach($childs as $child)
	@if(count($child->childs) > 0)
 		<div class="panel panel-default">
		<?php 
			$rand = str_random(4);
		?>
	        <div class="panel-heading">
	            <h4 class="panel-title">
	                <a data-toggle="collapse" data-parent="#accordian" href="#{{$rand}}">
	                    <span class="badge pull-right"><i class="fa fa-angle-down"></i></span>
	                    {{$child->title}}
	                </a>
	            </h4>
	        </div>
	        <div id="{{$rand}}" class="panel-collapse collapse">
	            <div class="panel-body">
	                <ul>
	                	@foreach($child->topChilds as $childTopChild)
	                    <li><a href="{{url('/category/'.$childTopChild->url)}}">{{$childTopChild->title}} </a></li>
	                    @endforeach
	                    @foreach($child->moreChilds as $childMoreChild)
	                    <li><a href="{{url('/category/'.$childMoreChild->url)}}">{{$childMoreChild->title}} </a></li>
	                    @endforeach
	                </ul>
	            </div>
	        </div>
	    </div>
	@else
 		<div class="panel panel-default">
		    <div class="panel-heading">
	            <h4 class="panel-title">
	                <a href="{{url('/category/'.$child->url)}}">
	                    {{$child->title}}
	                </a>
	            </h4>
	        </div>
    	</div>
	@endif
@endforeach
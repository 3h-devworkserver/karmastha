{{Form::open(['url'=>$url, 'method'=>'delete', 'id'=>'bulkDeleteForm'])}}
	<input type="hidden" class="ids" name="ids">
	<div class="btn-group dropup">
	    <button type="button" class="btn btn-sm btn-karm dropdown-toggle" data-toggle="dropdown">
	    Bulk Action <span class="caret"></span></button>
	    <ul class="dropdown-menu" role="menu">
	      <li><a href="javascript:void(0);" class="bulkSubmit">Delete</a></li>
	      <!-- <li><a href="javascript:void(0);" class="submit">Select All</a></li>
	      <li><a href="javascript:void(0);" class="submit">Deselect All</a></li> -->
	    </ul>
	</div>
{{Form::close()}}
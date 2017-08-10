<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/productgroups/create')}}" class="btn btn-info btn-xs">Create Product Group</a>
    <a href="{{url('admin/productgroups')}}" class="btn btn-primary btn-xs">All Product Groups</a>
    <a href="#" class="btn btn-success btn-xs">Active Product Groups</a>
    <a href="#" class="btn btn-warning btn-xs">Inactive Product Groups</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Product Groups <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/productgroups/create')}}">Create Product Group</a></li>
            <li><a href="{{url('admin/productgroups')}}">All Product Groups</a></li>
            <li><a href="#">Active Product Groups</a></li>
            <li><a href="#">Inactive Product Groups</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
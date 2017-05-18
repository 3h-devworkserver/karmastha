<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/members/create')}}" class="btn btn-info btn-xs">Create Members</a>
    <a href="{{url('admin/members')}}" class="btn btn-primary btn-xs">All Members</a>
    <a href="#" class="btn btn-success btn-xs">Active Members</a>
    <a href="#" class="btn btn-warning btn-xs">Inactive Members</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Members <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/members/create')}}">Create Members</a></li>
            <li><a href="{{url('admin/members')}}">All Members</a></li>
            <li><a href="#">Active Members</a></li>
            <li><a href="#">Inactive Members</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
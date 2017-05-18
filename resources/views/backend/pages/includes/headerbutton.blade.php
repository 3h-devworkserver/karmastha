<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/pages/create')}}" class="btn btn-info btn-xs">Create Page</a>
    <a href="{{url('admin/pages')}}" class="btn btn-primary btn-xs">All Pages</a>
    <a href="#" class="btn btn-success btn-xs">Active Pages</a>
    <a href="#" class="btn btn-warning btn-xs">Inactive Pages</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Pages <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/pages/create')}}">Create Page</a></li>
            <li><a href="{{url('admin/pages')}}">All Pages</a></li>
            <li><a href="#">Active Pages</a></li>
            <li><a href="#">Inactive Pages</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
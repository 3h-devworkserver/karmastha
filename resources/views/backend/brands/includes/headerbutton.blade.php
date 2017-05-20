<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/brands/create')}}" class="btn btn-info btn-xs">Create brand</a>
    <a href="{{url('admin/brands')}}" class="btn btn-primary btn-xs">All Brands</a>
    <a href="#" class="btn btn-success btn-xs">Active Brands</a>
    <a href="#" class="btn btn-warning btn-xs">Inactive Brands</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Brands <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/Brands/create')}}">Create Brand</a></li>
            <li><a href="{{url('admin/Brands')}}">All Brands</a></li>
            <li><a href="#">Active Brands</a></li>
            <li><a href="#">Inactive Brands</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
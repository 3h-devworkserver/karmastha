<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/products/create')}}" class="btn btn-info btn-xs">Create Product</a>
    <a href="{{url('admin/products')}}" class="btn btn-primary btn-xs">All Product</a>
    <a href="#" class="btn btn-success btn-xs">Active Product</a>
    <a href="#" class="btn btn-warning btn-xs">Inactive Product</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Pages <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/products/create')}}">Create Product</a></li>
            <li><a href="{{url('admin/products')}}">All Product</a></li>
            <li><a href="#">Active Product</a></li>
            <li><a href="#">Inactive Product</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
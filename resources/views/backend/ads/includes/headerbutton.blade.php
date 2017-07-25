<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/ads/create')}}" class="btn btn-info btn-xs">Create Ads</a>
    <a href="{{url('admin/ads')}}" class="btn btn-primary btn-xs">All Ads</a>
    <a href="#" class="btn btn-success btn-xs">Active Ads</a>
    <a href="#" class="btn btn-warning btn-xs">Inactive Ads</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Ads <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/ads/create')}}">Create Ads</a></li>
            <li><a href="{{url('admin/ads')}}">All Ads</a></li>
            <li><a href="#">Active Ads</a></li>
            <li><a href="#">Inactive Ads</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
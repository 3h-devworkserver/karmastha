<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{url('admin/attributes/create')}}" class="btn btn-info btn-xs">Create Attribute</a>
    <a href="{{url('admin/attributes')}}" class="btn btn-primary btn-xs">All Attributes</a>
    {{-- <a href="#" class="btn btn-success btn-xs">Active Pages</a> --}}
    {{-- <a href="#" class="btn btn-warning btn-xs">Inactive Pages</a> --}}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Attributes <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('admin/attributes/create')}}">Create Attribute</a></li>
            <li><a href="{{url('admin/attributes')}}">All Attributes</a></li>
            {{-- <li><a href="#">Active Pages</a></li> --}}
            {{-- <li><a href="#">Inactive Pages</a></li> --}}
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
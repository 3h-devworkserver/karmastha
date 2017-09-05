<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
        <div class="input-group">
            {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

            <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span><!--input-group-btn-->
        </div><!--input-group-->
    {{ Form::close() }}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            @permission('view-pages-management')
                <li class="{{ active_class(Active::checkUriPattern('admin/pages*')) }} treeview">
                  <a href="#">
                    <i class="fa fa-files-o"></i><span>Page Manangement</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/pages*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/pages*'), 'display: block;') }}">
                    <?php /* ?>
                        <li class="{{ active_class(Active::checkUriPattern('admin/pages/create')) }}">
                          <a href="{!! url('admin/pages/create') !!}"><i class="fa fa-plus"></i> Create</a>
                        </li>
                    <?php */ ?>
                    <li class="{{ active_class(Active::checkUriPattern('admin/pages ')) }}">
                      <a href="{!! url('admin/pages') !!}"><i class="fa fa-file-text-o"></i> All Pages</a>
                    </li>
                  </ul>
                </li>
            @endauth

            @permission('view-menu-management')
                <li class="{{ active_class(Active::checkUriPattern('admin/category')) }}">
                    <a href="{{ url('admin/category') }}">
                        <i class="fa fa-tags"></i>
                        <span>Category Management</span>
                    </a>
                </li>
            @endauth

            @permission('view-products-management')
                <li class="{{ active_class(Active::checkUriPattern('admin/products*')) }} treeview">
                  <a href="#">
                    <i class="fa fa-list"></i><span>Product Manangement</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/products*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/products*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/products/create')) }}">
                      <a href="{!! url('admin/products/create') !!}"><i class="fa fa-plus"></i> Create</a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/products')) }}">
                      <a href="{!! url('admin/products') !!}"><i class="fa fa-file-text-o"></i> All Products</a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/products')) }}">
                      <a href="{!! url('admin/attributes') !!}"><i class="fa fa-file-text-o"></i> Attributes Management</a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/products')) }}">
                      <a href="{!! url('admin/productgroups') !!}"><i class="fa fa-file-text-o"></i> Product Group Management</a>
                    </li>
                  </ul>
                </li>
            @endauth

            @permission('view-members-management')
                <li class="{{ active_class(Active::checkUriPattern('admin/members*')) }} treeview">
                  <a href="{!! url('admin/members') !!}">
                    <i class="fa fa-handshake-o"></i><span> Members Manangement</span>
                  </a>
                </li>
            @endauth

            @permission('view-ads-management')
                <li class="{{ active_class(Active::checkUriPattern('admin/ads*')) }} treeview">
                  <a href="{!! url('admin/ads') !!}">
                    <i class="fa fa-bullhorn"></i><span> Ads Manangement</span>
                  </a>
                </li>
            @endauth

            @permission('view-brands-management')
                <li class="{{ active_class(Active::checkUriPattern('admin/brands*')) }} treeview">
                  <a href="{!! url('admin/brands') !!}">
                    <i class="fa fa-cubes"></i><span>Brands Manangement</span>
                  </a>
                </li>
            @endauth


            @permission('view-settings-management')
            <li class="{{ active_class(Active::checkUriPattern('admin/settings*')) }} treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i><span>Setting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
                <ul class="treeview-menu {{active_class( Active::checkUriPattern('admin/settings*'),'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/settings*'), 'display: block;') }}">
                    <li class="{{ Active::checkUriPattern('admin/settings/general') }}">
                        <a href="{!! url('admin/settings/general') !!}"><i class="fa fa-cog"></i> General</a>
                    </li>

                    {{-- <li class="{{ Active::checkUriPattern('admin/settings/cart') }}">
                        <a href="{!! url('admin/settings/cart') !!}"><i class="fa fa-shopping-cart"></i> Cart Sidebar</a>
                    </li> --}}

                    <li class="{{ active_class(Active::checkUriPattern('admin/settings/Emails')) }} treeview">
                        <a href="#">
                            <i class="fa fa-envelope"></i><span>Email templates</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu {{active_class( Active::checkUriPattern('admin/ settings/Emails*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/settings/Emails*'), 'display: block;') }}">

                           <li class="{{ Active::checkUriPattern('admin/settings/Emails/activateuser') }}">
                              <a href="{!! url('admin/settings/Emails/activate') !!}"><i class="fa fa-cog"></i>  Activate User
                              </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            @endauth


            @permission('view-slider-management')
            <li class="{{ active_class(Active::checkUriPattern('admin/sliders*')) }} treeview">
                <a href="#">
                    <i class="fa fa-image"></i><span>Slider Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
                <ul class="treeview-menu {{active_class( Active::checkUriPattern('admin/sliders*'),'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/sliders*'), 'display: block;') }}">                    
                    <li class="{{ active_class(Active::checkUriPattern('admin/sliders/create')) }} treeview">
                        <a href="{!! url('admin/sliders/create') !!}"><i class="fa fa-plus"></i> Create</a>
                    </li>
                    <li class="{{ Active::checkUriPattern('admin/sliders/view') }}">
                        <a href="{!! url('admin/sliders') !!}"><i class="fa fa-file-text-o"></i> All Sliders</a>
                    </li>
                </ul>
            </li>
            @endauth

            @permission('view-static_block-management')
            <li class="{{ active_class(Active::checkUriPattern('admin/static_blocks*')) }} treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i><span>Static-Block Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                
                <ul class="treeview-menu {{active_class( Active::checkUriPattern('admin/static_blocks*'),'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/static_blocks*'), 'display: block;') }}">                    
                    <li class="{{ active_class(Active::checkUriPattern('admin/sltatic_blocks/create')) }} treeview">
                        <a href="{!! url('admin/static_blocks/create') !!}"><i class="fa fa-plus"></i> Create</a>
                    </li>
                    <li class="{{ Active::checkUriPattern('admin/static_blocks/view') }}">
                        <a href="{!! url('admin/static_blocks') !!}"><i class="fa fa-file-text-o"></i>All Static-blocks</a>
                    </li>
                </ul>
            </li>
            @endauth

            
            
            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            

            @role(1)
            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.access.title') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                        <a href="{{ route('admin.access.user.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.users.management') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                        <a href="{{ route('admin.access.role.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.roles.management') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endauth

            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
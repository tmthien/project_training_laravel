<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('/admin') }}"><i class="fa-solid fa-house"></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="{{ url('/admin/users') }}"><i class="fa-solid fa-users"> </i> <span>Tài khoản admin</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa-solid fa-registered"></i> <span>Quản lý vai trò</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/roles') }}"><i class="fa-solid fa-list-ul"></i> Danh sách</a></li>
                    <li><a href="{{ url('admin/roles/create') }}"><i class="fa-solid fa-plus"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa-solid fa-rectangle-list"></i> <span>Danh mục sản phẩm</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/categories') }}"><i class="fa-solid fa-list-ul"></i> Danh sách</a></li>
                    <li><a href="{{ url('admin/categories/create') }}"><i class="fa-solid fa-plus"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa-brands fa-product-hunt"></i> <span>Sản phẩm</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/products') }}"><i class="fa-solid fa-list-ul"></i> Danh sách</a></li>
                    <li><a href="{{ url('admin/products/create') }}"><i class="fa-solid fa-plus"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa-solid fa-basket-shopping"></i> <span>Đơn hàng</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/orders') }}"><i class="fa-solid fa-list-ul"></i> Danh sách</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

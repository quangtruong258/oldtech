<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="backend/img/profile_small.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong
                                    class="font-bold">{{ auth()->user()->email }}</strong>
                            </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.auth.logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý thành viên</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.dashboad.user') }}">Quản lý thành viên</a></li>
                    <li class="active"><a href="dashboard_2.html">Quản lý nhóm thành viên</a></li>
                    {{-- <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                    <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                    <li><a href="dashboard_5.html">Dashboard v.5 </a></li> --}}
                </ul>
            </li>

            <li class="active">
                <a href="{{ route('category.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý
                        danh mục</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('category.index') }}">Quản lý danh mục</a></li>
                    <li class="active"><a href="dashboard_2.html">Quản lý nhóm thành viên</a></li>

                </ul>
            </li>

            <li class="active">
                <a href="{{ route('product.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý
                        sản phẩm</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('product.index') }}">Danh sách sản phẩm</a></li>
                    <li><a href="{{ route('product.create') }}">Thêm sản phẩm</a></li>
                    {{-- <li class="active"><a href="dashboard_2.html">Quản lý nhóm thành viên</a></li> --}}
                </ul>
            </li>

            <li class="active">
                <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Quản lý
                        đơn hàng</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.order.index') }}">Đơn hàng đã xác nhận</a></li>
                    <li><a href="{{ route('admin.order.index') }}?status=0">Đơn hàng chờ xác nhận</a></li>
                    <li><a href="{{ route('admin.order.index') }}?status=2">Đơn hàng đã giao</a></li>
                    <li><a href="{{ route('admin.order.index') }}?status=3">Đơn hàng đã hủy</a></li>
                    {{-- <li><a href="{{ route('product.create') }}">Thêm sản phẩm</a></li> --}}
                    {{-- <li class="active"><a href="dashboard_2.html">Quản lý nhóm thành viên</a></li> --}}
                </ul>
            </li>

             </ul>
            </li>
  
        </ul>

    </div>
</nav>

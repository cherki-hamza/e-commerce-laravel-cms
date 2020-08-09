<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{route('admin')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                    <span class="pull-right-container">
                     </span>
                </a>
            </li>
            <!-- start users -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i><span>Users</span>
                    <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users')}}">Show All Users</a></li>
                    <li><a href="">List Users</a></li>
                    <
                </ul>
            </li>
            <!-- end users -->
            <!-- start customer -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-basket"></i><span>Products</span>
                    <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('product.create')}}">Add New Product</a></li>
                    <li><a href="{{route('product.index')}}">Show Products</a></li>
                    <li><a href="{{route('trashed.index')}}">SoftDelete Products (trashed)</a></li>
                </ul>
            </li>
            <!-- end customer -->

            <!-- start customer -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i><span>Orders</span>
                    <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('orders.cart')}}">Show All Orders</a></li>
                    <li><a href="">List Users</a></li>
                    <
                </ul>
            </li>
            <!-- end customer -->

            <!-- start note -->
            <!-- end not -->

            <li>
                <a href="">
                    <i class="fa fa-comment"></i> <span>Notes</span>
                    <span class="pull-right-container">
                     </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>

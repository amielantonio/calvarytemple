<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>
            <li>
                <a href="<?= direct_admin_url()?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <!--View for Admin only-->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Reservations</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= direct_admin_url( 'reservation' )?>"><i
                                    class="fa fa-circle-o"></i> View Reservations</a></li>
                    <li><a href="<?= direct_admin_url( 'reservation/add' )?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="<?= direct_admin_url('reservation/categories' )?>"><i
                                    class="fa fa-circle-o"></i> Categories</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-shield"></i> <span>Security</span>
                </a>
            </li>

            <!--end admin view-->

            <!--View for Author only-->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Events</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> View Events</a></li>
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Blogs</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> View Blogs</a></li>
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> Categories</a></li>
                </ul>
            </li>

            <!--end author view-->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>User</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> View Users</a></li>
                    <li><a href="#"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
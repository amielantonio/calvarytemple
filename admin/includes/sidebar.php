<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>
            <li>
                <a href="<?= direct_admin_url() ?>">
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
                    <li><a href="<?= direct_admin_url('reservation') ?>">
                            <i class="fa fa-circle-o"></i> View Reservations</a>
                    </li>
                    <li><a href="<?= direct_admin_url('reservation/pending') ?>">
                            <i class="fa fa-circle-o"></i> Pending Reservations</a>
                    </li>
                    <li><a href="<?= direct_admin_url('reservation?action=create') ?>">
                            <i class="fa fa-circle-o"></i> Add New</a>
                    </li>
                    <li><a href="<?= direct_admin_url('reservation/categories') ?>">
                            <i class="fa fa-circle-o"></i> Categories</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="<?= direct_admin_url('reservation/pending?action=create') ?>">
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
                    <li><a href="<?= direct_admin_url('events') ?>"><i
                                    class="fa fa-circle-o"></i> View Events</a></li>
                    <li><a href="<?= direct_admin_url('events?action=create') ?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Posts</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= direct_admin_url('post') ?>"><i
                                    class="fa fa-circle-o"></i> View Posts</a></li>
                    <li><a href="<?= direct_admin_url('post?action=create') ?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="<?= direct_admin_url('post/categories') ?>"><i
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
                    <li><a href="<?= direct_admin_url('user') ?>"><i
                                    class="fa fa-circle-o"></i> View User</a></li>
                    <li><a href="<?= direct_admin_url('user?action=create') ?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="<?= direct_admin_url('settings') ?>">
                    <i class="fa fa-wrench"></i> <span>Settings</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
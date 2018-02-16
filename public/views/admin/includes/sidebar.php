<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>
            <li>
                <a href="<?= route( 'dashboard' ) ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <!--View for Admin only-->
            <?php
            //Pending Reservations
            $where = "reservation_status = 'Pending'";

            $pending_total = count( where( 'reservations', $where) );

            ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Reservations</span> <?php if ($pending_total > 0) : ?><span class="badge"><?= $pending_total?></span> <?php endif; ?>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= route('dashboard/reservation') ?>">
                            <i class="fa fa-circle-o"></i> View Reservations</a>
                    </li>

                    <li><a href="<?= route('dashboard/reservation/pending') ?>">
                            <i class="fa fa-circle-o"></i> Pending Reservations <?php if ($pending_total > 0) : ?><span class="badge"><?= $pending_total?></span> <?php endif; ?></a>
                    </li>
                    <li><a href="<?= route('dashboard/reservation/create') ?>">
                            <i class="fa fa-circle-o"></i> Add New</a>
                    </li>
                    <li><a href="<?= route('dashboard/reservation/categories') ?>">
                            <i class="fa fa-circle-o"></i> Categories</a>
                    </li>
                    <li><a href="<?= route('dashboard/reservation/archive') ?>">
                            <i class="fa fa-circle-o"></i> Archives</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="<?= route('dashboard/security') ?>">
                    <i class="fa fa-shield"></i> <span>Security</span>
                </a>
            </li>

            <!--end admin view-->

            <!--View for Author only-->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Posts</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= route('dashboard/post') ?>"><i
                                    class="fa fa-circle-o"></i> View Posts</a></li>
                    <li><a href="<?= route('dashboard/post/create') ?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="<?= route('dashboard/post/categories') ?>"><i
                                    class="fa fa-circle-o"></i> Categories</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Events</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= route('dashboard/events') ?>"><i
                                    class="fa fa-circle-o"></i> View Events</a></li>
                    <li><a href="<?= route('dashboard/events/create') ?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
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
                    <li><a href="<?= route('dashboard/user') ?>"><i
                                    class="fa fa-circle-o"></i> View User</a></li>
                    <li><a href="<?= route('dashboard/user/create') ?>"><i
                                    class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="<?= route('dashboard/settings') ?>">
                    <i class="fa fa-wrench"></i> <span>Settings</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= route('') ?>"><i
                                    class="fa fa-circle-o"></i> SMS </a></li>
                    <li><a href="<?= route('') ?>"><i
                                    class="fa fa-circle-o"></i> Security</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
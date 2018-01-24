<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- JQUERYUI -->
    <!--    <link rel="stylesheet" href="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/jquery-ui/themes/base/datepicker.css">-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-calendar-plus-o"></i> Pending Reservations
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-sm-12">
                    <div class="box with-border">

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th>Reserver Name</th>
                                    <th>Reservation Type</th>
                                    <th>Date of Event</th>
                                    <th>Date reserved</th>
                                    <th>Actions</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Wedding</td>
                                    <td>Jan 20, 2018</td>
                                    <td>Jan 20, 2018</td>
                                    <td>View</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--END BOX-->

                </div>
                <!--END COLUMN-->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



<?php admin_get_footer(); ?>
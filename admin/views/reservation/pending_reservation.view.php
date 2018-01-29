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
                                    <th>#</th>
                                    <th>Reserver Name</th>
                                    <th>Reservation</th>
                                    <th>Date of Event</th>
                                    <th>Date reserved</th>
                                    <th>Actions</th>
                                </tr>

                                <?php $x = 1; foreach( $pending as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $x ?></td>
                                    <td><?php echo $value['reserver_name']?></td>
                                    <td><?php echo $value['reservation']?></td>
                                    <td><?php echo date('M d, Y - g:i A', strtotime( $value[ 'reservation_date' ] ) ); ?></td>
                                    <td><?php echo date('M d, Y - g:i A', strtotime( $value[ 'created_at' ] ) ); ?></td>
                                    <td>
                                        <a href="<?php echo direct_admin_url( 'reservation/pending?action=show&id='.$value['id'] ); ?>">
                                            <button type="button" class="btn btn-primary">
                                                Approve
                                            </button>
                                        </a>

                                        <a href="<?= direct_admin_url('reservation/pending?action=create') ?>" class="btn btn-warning">
                                            Reschedule
                                        </a>

                                        <a href="<?php echo direct_admin_url( 'reservation/pending?action=cancel' );?>">
                                            <button type="button" class="btn btn-danger">
                                                Cancel
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <?php $x++; endforeach; ?>

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
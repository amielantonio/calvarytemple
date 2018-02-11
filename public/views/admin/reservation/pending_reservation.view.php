<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <link rel="stylesheet" href="<?= asset( 'plugins/adminlte/bower_components/select2/dist/css/select2.min.css' )?>">
    <link rel="stylesheet" href="<?= asset( 'plugins/timepicker/bootstrap-timepicker.min.css' )?>">
    <link rel="stylesheet" href="<?= asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' )?>">

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

            <?php if( isset( $alert ) ) : ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-<?= $alert['alertable'] ?> alert-dismissible fade show" role="alert">
                        <?= $alert['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

            <?php  endif;?>


            <div class="row">

                <div class="col-sm-12">
                    <div class="box with-border">
                        <div class="box-header">
                            <h3 class="box-title"></h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END BOX HEADER-->

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

                                <?php if( empty($pending) ) :  ?>

                                <td colspan="6">
                                    <h3 class="text-center">No Pending Reservations</h3>
                                </td>

                                <?php endif;?>

                                <?php $x = 1; foreach( $pending as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $x ?></td>
                                    <td><?php echo $value['reserver_name']?></td>
                                    <td><?php echo $value['reservation']?></td>
                                    <td><?php echo date('M d, Y - g:i A', strtotime( $value[ 'reservation_startdate' ] ) ); ?></td>
                                    <td><?php echo date('M d, Y - g:i A', strtotime( $value[ 'created_at' ] ) ); ?></td>
                                    <td>
                                        <a href="<?php echo route( "dashboard/reservation/pending/{$value['id']}/approve" ); ?>">
                                            <button type="button" class="btn btn-primary">
                                                Approve
                                            </button>
                                        </a>

                                        <a href="<?php echo route( "dashboard/reservation/pending/{$value['id']}/destroy" );?> ">
                                            <button type="button" class="btn btn-danger">
                                                Cancel
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                                <?php $x++; endforeach; ?>

                                <tr>
                                    <th>#</th>
                                    <th>Reserver Name</th>
                                    <th>Reservation</th>
                                    <th>Date of Event</th>
                                    <th>Date reserved</th>
                                    <th>Actions</th>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!--END BOX BODY-->

                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                        <!-- /.box-footer -->

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
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
                <i class="fa fa-archive"></i> Archives
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

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

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>#</th>
                                    <th>Reserver Name</th>
                                    <th>Reservation</th>
                                    <th>Facilitator</th>
                                    <th>Date of Event</th>
                                </tr>

                                <?php if( empty($archive) ) :  ?>

                                    <td colspan="6">
                                        <h3 class="text-center">No Archives</h3>
                                    </td>

                                <?php endif;?>

                                <?php $x = 1; foreach( $archive as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $x ?></td>
                                        <td><?php echo $value['reserver_name']?></td>
                                        <td><?php echo $value['reservation']?></td>
                                        <td><?php echo  $value['pastor']?></td>
                                        <td><?php echo date('M d, Y - g:i A', strtotime( $value[ 'reservation_startdate' ] ) ); ?></td>
                                    </tr>

                                    <?php $x++; endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!--END BODY-->

                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->

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
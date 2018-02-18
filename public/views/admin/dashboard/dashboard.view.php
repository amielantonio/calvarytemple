<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) ?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-sm-4">
                <div class="box box-info">
                    <div class="box-header with-boarder">
                        <h3 class="box-title">New Reservations</h3>

                    </div>

                    <div class="box-body">
                        <ul class="products-list product-list-in-box">

                            <?php if ( empty( $new_reservations ) ) : ?>

                                <h5>No reservations</h5>

                            <?php else: ?>

                                <?php foreach($new_reservations as $key => $value) : ?>

                                    <li class="item">
                                        <div class="product-info no-margin">
                                            <a href="#" class="product-title">

                                                <?php echo $value['reserver_name'] ?>

                                                <span class="pull-right"><i class="fa fa-clock-o"></i> <?php echo date('M d, Y', strtotime($value['reservation_startdate']))?></span>
                                            </a>
                                            <span class="product-description">
                                        <?php echo $value['reservation']?>
                                    </span>
                                        </div>
                                    </li>

                                <?php endforeach; ?>

                            <?php endif;?>
                        </ul>
                        <!--END PRODUCT-->

                    </div>

                </div>
                <!--END BOX-->
            </div>
            <!--END COLUMN-->

            <div class="col-sm-4">
                <div class="box box-info">
                    <div class="box-header with-boarder">
                        <h3 class="box-title">Upcoming Reservations</h3>

                    </div>

                    <div class="box-body">
                        <ul class="products-list product-list-in-box">

                        <?php if ( empty( $upcoming ) ) : ?>

                            <h5>No reservations</h5>

                        <?php else: ?>

                            <?php foreach($upcoming as $key => $value) : ?>

                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">

                                            <?php echo $value['reserver_name'] ?>

                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <?php echo date('M d, Y', strtotime($value['reservation_startdate']))?></span>
                                        </a>
                                        <span class="product-description">
                                        <?php echo $value['reservation']?>
                                    </span>
                                    </div>
                                </li>

                            <?php endforeach; ?>
                        <?php endif; ?>

                        </ul>
                        <!--END PRODUCT-->
                    </div>

                </div>
            </div>

            <div class="col-sm-4">

                <div class="box box-info">
                    <div class="box-header with-boarder ">
                        <h3 class="box-title">Pending Reservations</h3>

                        <?php if( $pending_total > 2 ) : ?>
                            <div class="box-tools">
                                <a href="<?= route( 'dashboard/reservation/pending' ); ?>">
                                    <button type="button" class="btn btn-primary">
                                        View All <span class="badge"><?= ($pending_total > 2) ? $pending_total : "" ?></span>
                                    </button>
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>


                    <div class="box-body">
                        <ul class="products-list product-list-in-box">

                            <?php if ( empty( $pending ) ) : ?>

                                <h5>No reservations</h5>

                            <?php else: ?>

                                <?php foreach($pending as $key => $value) : ?>

                                    <li class="item">
                                        <div class="product-info no-margin">
                                            <a href="#" class="product-title">

                                                <?php echo $value['reserver_name'] ?> <br />
                                                <i class="fa fa-clock-o"></i> <?php echo date('M d, Y', strtotime($value['reservation_startdate']))?>

                                            </a>

                                            <div class="pull-right">
                                                <a href="<?php echo route( "dashboard/reservation/pending/{$value['id']}/approve" ); ?>">
                                                    <button class="btn btn-info"><i class="fa fa-check"></i></button>
                                                </a>

                                                <a href=" <?php echo route( "dashboard/reservation/pending/{$value['id']}/destroy" );?> ">
                                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                </a>

                                            </div>

                                            <span class="product-description">
                                            <?php echo $value['reservation']?>

                                        </span>
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                        <!--END PRODUCT-->

                    </div>
                    <!--END BODY-->

                </div>
                <!--END BOX-->




            </div>
            <!--END COLUMN-->


        </div>
        <!--END ROW-->

        <div class="row">
            <div class="col-sm-6">
                <div class="box box-solid bg-blue-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="<?= route('dashboard/reservation/create'); ?>">Add new Reservation</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?= route('dashboard/reservation'); ?>">View calendar</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                    <b>Total Reservations: </b> 0
                                    
                                </div>

                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!--END BOX-->
            </div>
            <!--END COLUMN-->
        </div>
        <!--END ROW-->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

    <!-- date-range-picker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/moment/min/moment.min.js' ) ?>"></script>
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/jquery-ui/jquery-ui.min.js' ) ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) ?>"></script>

<script>

    $ = jQuery;
    $(function () {

        // The Calender
        $('#calendar').datepicker();




    });
</script>
<?php admin_get_footer(); ?>
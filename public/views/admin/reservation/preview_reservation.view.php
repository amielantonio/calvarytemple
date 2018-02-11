<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-calendar-plus-o"></i> Preview Reservation
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-sm-12">
                <div class="box with-border">
                    <div class="box-header">
                        <h3 class="box-title"><?= isset($reservation)? $reservation['reserver_name']." - ". $reservation[ 'reservation' ] : "" ?></h3>
                    </div>
                    <!--END BOX HEADER-->

                    <div class="box-body">

                        <div class="row">
                            <div class="col-sm-2">
                                <b>Start Date:</b>
                            </div>

                            <div class="col-sm-10">
                                <?= isset($reservation)? $reservation['reservation_startdate'] : ""?>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-2">
                                <b>End Date:</b>
                            </div>

                            <div class="col-sm-10">
                                <?= isset($reservation)? $reservation['reservation_enddate'] : ""?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <b>Facilitator</b>
                            </div>

                            <div class="col-sm-10">
                                <?= isset($reservation)? $reservation['facilitator'] : ""?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <b>Approved By: </b>
                            </div>

                            <div class="col-sm-10">
                                <?= isset($reservation)? $reservation['approved_by'] : ""?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <b>Approval Date:</b>
                            </div>

                            <div class="col-sm-10">
                                <?= isset($reservation)? $reservation['approved_date'] : ""?>
                            </div>
                        </div>

                    </div>
                    <!--END BOX BODY-->

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

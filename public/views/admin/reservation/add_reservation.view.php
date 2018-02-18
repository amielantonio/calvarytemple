<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) ?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/timepicker/bootstrap-timepicker.min.css' ) ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/css/select2.min.css' ) ?>">

    <!-- JQUERYUI -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-calendar"></i> Calendar
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <?php if( isset( $_GET['alert'] ) and $_GET['alert'] == 1 ) : ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <b>Reservation Failed</b>, There is already an existing reservation during that time.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

            <?php  endif;?>

            <div class="row">

                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">

                        </div>

                        <div class="box-body">
                            <form method="post" action="<?php echo route( 'dashboard/reservation/store' )?>">

                                <input type="hidden" name="approved_by" value="<?= auth_user()['firstname']." ".auth_user()['lastname']?>">

                                <div class="form-group">

                                    <label for="reserver_name"> Reserver Name</label>
                                    <input type="text" placeholder="" name="reserver_name" class="form-control" required="required" id="reserver_contact">

                                </div>

                                <div class="form-group">

                                    <label for="reserver_contact"> Reserver Contact Number</label>
                                    <input type="text" placeholder="" name="reserver_contact" class="form-control" required="required" id="reserver_contact">

                                </div>

                                <div class="form-group">

                                    <label for="reservation">Reservation</label>


                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="reservation" required="required">
                                        <?php if( !empty($reservation_types )) : ?>
                                        <?php foreach($reservation_types as $key=>$val) : ?>
                                            <option><?php echo $val['reservation_category']?></option>
                                        <?php endforeach;?>
                                        <?php endif; ?>
                                    </select>


                                </div>

                                <div class="form-group">

                                    <label for="startDate">Start Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="startDate" name="reservation_startdate" value="<?= date('m/d/Y') ?>"  required="required">
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Start Time</label>

                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control timepicker" name="startTime"  required="required">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                <div class="form-group">
                                    <label for="reservation">Facilitator</label>
                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="facilitator" required="required">
                                        <option selected="selected">Ptr. A</option>
                                        <option>Ptr. B</option>
                                        <option>Ptr. C</option>
                                        <option>Ptr. D</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit Reservation</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
                <!--END COLUMN-->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- date-range-picker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/moment/min/moment.min.js' ) ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) ?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo asset( 'plugins/timepicker/bootstrap-timepicker.min.js' ) ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ) ?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo asset( 'plugins/iCheck/icheck.min.js' ) ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/js/select2.full.min.js' ) ?>"></script>

    <script>
        $ = jQuery;
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Date picker
            $('#startDate').datepicker({
                autoclose: true,
                todayBtn: true,
                startDate: '<?= date('m-d-Y')?>',
                format: 'mm/dd/yyyy'
            })
            $('#endDate').datepicker({
                autoclose: true,
                todayBtn: true,
                startDate: '<?= date('m-d-Y')?>',
                format: 'mm/dd/yyyy'
            })


            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })




        });
    </script>

<?php admin_get_footer(); ?>
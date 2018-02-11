<?php get_header(); ?>
<?php get_nav(); ?>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= asset( 'plugins/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css' )?>">
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css' ) ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) ?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/timepicker/bootstrap-timepicker.min.css' ) ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/css/select2.min.css' ) ?>">



    <main class="app">



        <section class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">

                        </div>

                        <div class="box-body">
                            <form method="post" action="<?php echo route( 'dashboard/reservation/store' )?>">

                                <input type="hidden" name="personnel" value="This someone">
                                <input type="hidden" name="reservation_status" value="Approved">

                                <div class="form-group">

                                    <label for="reserver_name"> Reserver Name</label>
                                    <input type="text" placeholder="" name="reserver_name" class="form-control">

                                </div>

                                <div class="form-group">

                                    <label for="reservation">Reservation</label>


                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="reservation">
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
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="startDate" name="reservation_startdate" value="<?= date('m/d/Y') ?>">
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Start Time</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="startTime">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                <div class="form-group">

                                    <label fm/d/or="endDate">End Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="endDate" name="reservation_enddate" value="<?= date('m/d/Y') ?>" >
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>End Time</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="endTime">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>


                                <div class="form-group">
                                    <label for="reservation">Facilitator</label>
                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="facilitator">
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

                <div class="col-sm-4">

                </div>
                <!--END COLUMN-->

            </div>
        </section>

    </main>


    <!-- InputMask -->
    <script src="<?php echo asset( 'plugins/input-mask/jquery.inputmask.js' ) ?>"></script>
    <script src="<?php echo asset( 'plugins/input-mask/jquery.inputmask.date.extensions.js' ) ?>"></script>
    <script src="<?php echo asset( 'plugins/input-mask/jquery.inputmask.extensions.js' ) ?>"></script>
    <!-- date-range-picker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/moment/min/moment.min.js' ) ?>"></script>
    <!--    <script src="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
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
                autoclose: true
            })
            $('#endDate').datepicker({
                autoclose: true
            })


            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })




        });
    </script>
<?php get_footer(); ?>
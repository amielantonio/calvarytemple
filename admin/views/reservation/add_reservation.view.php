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
                <i class="fa fa-calendar"></i> Calendar
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">

                        </div>

                        <div class="box-body">
                            <form method="post" action="<?php echo direct_admin_url( 'reservation?action=store' )?>">

                                <input type="hidden" name="personnel" value="">
                                <input type="hidden" name="reservation_status" value="Approved">

                                <div class="form-group">

                                    <label for="reserver_name"> Reserver Name</label>
                                    <input type="text" placeholder="" name="reserver_name" class="form-control">

                                </div>

                                <div class="form-group">

                                    <label for="reservation">Reservation</label>
                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="reservation">
                                        <option selected="selected">Wedding</option>
                                        <option>Dedication</option>
                                        <option>Counselling</option>
                                        <option>Preaching</option>
                                    </select>

                                </div>

                                <div class="form-group">

                                    <label for="datepicker">Start Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="reservation_date" >
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Time picker:</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="time">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>


                                <div class="form-group">
                                    <label for="reservation">Pastor</label>
                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="pastor">
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- InputMask -->
    <script src="<?php echo resource_dir() ?>/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo resource_dir() ?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo resource_dir() ?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo resource_dir() ?>/plugins/adminlte/bower_components/moment/min/moment.min.js"></script>
<!--    <script src="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
    <!-- bootstrap datepicker -->
    <script src="<?php echo resource_dir() ?>/plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- datepicker -->
<!--    <script src="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/jquery-ui/ui/minified/datepicker.min.js"></script>-->
    <!-- bootstrap color picker -->
<!--    <script src="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>-->
    <!-- bootstrap time picker -->
    <script src="<?php echo resource_dir() ?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo resource_dir() ?>/plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo resource_dir() ?>/plugins/iCheck/icheck.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo resource_dir() ?>/plugins/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>

    <script>
        $ = jQuery;
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })

        });
    </script>

<?php admin_get_footer(); ?>
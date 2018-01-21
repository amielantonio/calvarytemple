<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/adminlte/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= resource_dir()?>/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">


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
                            <form method="post" class="" action="">
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
                                    <label for="reservation_date">Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="reservation_date" id="reservation_date">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <div class="form-group">
                                    <label for="reservation">Pastor</label>
                                    <select class="form-control select2" style="width: 100%;" id="reservation" name="reservation">
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


<script src="<?php echo resource_dir()?>/plugins/adminlte/bower_components/select2/dist/js/select2.full.js"></script>
<script src="<?php echo resource_dir()?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <script>
        $ = jQuery;
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

        });
    </script>

<?php admin_get_footer(); ?>